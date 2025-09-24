<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Actions\User\CreateUserAction;
use App\Actions\User\UpdateUserAction;
use App\Jobs\SendResetPasswordMailJob;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\ResetUserPasswordRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * @group Gestion des utilisateurs
 *
 * APIs pour la gestion des utilisateurs
 */
class UserController extends Controller
{
    use ApiResponse;

    /**
     * Lister les utilisateurs
     */
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', User::class);

        $users = User::useFilters()
            ->with(['currentRole','entity','status'])
            ->latest('created_at')
            // ->accessibleBy(auth()->user())
            ->useFilters()
            ->dynamicPaginate();

        return UserResource::collection($users);
    }

    /**
     * Créer un nouvel utilisateur
     */
    public function store(CreateUserRequest $request, CreateUserAction $createUser): JsonResponse
    {
        // $this->authorize('create', User::class);

        // dd($request->keys());

        $user = $createUser->execute($request->validated());

        return $this->responseCreated('Utilisateur créée avec succès', new UserResource($user));
    }

    /**
     * Afficher un utilisateur
     */
    public function show(User $user): JsonResponse
    {
        $this->authorize('view', $user);

        return $this->responseSuccess(null, new UserResource($user->load('currentRole','entity','status')));
    }

    /**
     * Mettre à jour un utilisateur les informations de l'utilisateur
     */
    public function update(UpdateUserRequest $request, $id, UpdateUserAction $updateUser): JsonResponse
    {
        // $this->authorize('update', $user);
        $user = User::findOrFail($id);

        $updateUser->execute($user, $request->validated());

        if($request->file('signature') && $request->hasfile('signature')){
            $now = Carbon::now();
            $annee = date("Y");
            $mois_jour_heure = date("mdH");
            $time = date("is");
            $today = $annee.'_'.$mois_jour_heure.'_'.$time;

            $signature_path = $request->file('signature');
            $signature_name = 'SIG'.$today.'.png';
            $signature_path->move(public_path('storage/signature'), $signature_name);
            $signature = $signature_name;
            
            $user->signature = $signature;
            $user->save();
        }

        return $this->responseSuccess('Utilisateur mis à jour avec succès', new UserResource($user));
    }

    /**
     * Mettre à jour les informations de l'utilisateur de profil de l'utilisateur connecté
     */
    public function update_profile(UpdateUserRequest $request): JsonResponse
    {
        $user = auth()->user();

        $user->update($request->validated());

        if($request->file('signature') && $request->hasfile('signature')){
            $now = Carbon::now();
            $annee = date("Y");
            $mois_jour_heure = date("mdH");
            $time = date("is");
            $today = $annee.'_'.$mois_jour_heure.'_'.$time;

            $signature_path = $request->file('signature');
            $signature_name = 'SIG'.$today.'.png';
            $signature_path->move(public_path('storage/signature'), $signature_name);
            $signature = $signature_name;
            
            $user->signature = $signature;
            $user->save();
        }

        return $this->responseSuccess('Profil mis à jour avec succès', new UserResource($user));
    }

    /**
     * Activer un utilisateur
     */
    public function enable($id)
    {
        $user = User::findOrFail($id);
        $user->update(
            [
                'status_id' => 1,
                'updated_by' => auth()->user()->id,
            ]
        );

        return $this->responseSuccess('Utilisateur mis à jour avec succès', new UserResource($user));
    }

    /**
     * Désactiver un utilisateur
     */
    public function disable($id)
    {
        $user = User::findOrFail($id);
        $user->update(
            [
                'status_id' => 2,
                'updated_by' => auth()->user()->id,
            ]
        );

        return $this->responseSuccess('Utilisateur mis à jour avec succès', new UserResource($user));
    }

    /**
     * Réinitialiser le mot de passe d'un utilisateur par un administrateur
     */
    public function reset($id)
    {
        $user = User::findOrFail($id);

        if($user){
            // $password = $this->randomPassword();
            $password = "12345678";

            $user->update([
                'password' => Hash::make($password),
            ]);

            if($user){

                dispatch(new SendResetPasswordMailJob($user, $password));

                return $this->responseSuccess('Compte réinitialisé avec succès.', new UserResource($user));

            }
        }

    }

    /**
     * Réinitialiser le mot de passe d'un utilisateur par lui-même
     */
    public function reset_password(ResetPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user){
            $password = $this->randomPassword();

            $user->update([
                'password' => Hash::make($password),
            ]);

            if($user){

                Mail::to($user->email)->cc('brahimafane06@gmail.com')->send(new ResetPassword($user->email,$password));


                return $this->responseSuccess('Compte réinitialisé avec succès.', new UserResource($user));

            }

        } else {
            return $this->responseNotFound('Utilisateur non trouvé !');
        }

    }

    /**
     * Modifier les informations d'un utilisateur connecté par lui-même
     */
    public function reset_user_password(ResetUserPasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $annee = date("Y");
        $mois_jour_heure = date("mdH");
        $time = date("is");
        $today = $annee.'_'.$mois_jour_heure.'_'.$time;

        // Check Password
        if ($user && Hash::check($request->current_password, $user->password)) {

            if($request->file('signature') && $request->hasfile('signature')){
                $signature_path = $request->file('signature');
                $signature_name = 'IMG'.$today.'.'.$signature_path->getClientOriginalExtension();
                $signature_path->move(public_path('storage/signature'), $signature_name);
                $signature = $signature_name;

                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'telephone' => $request->telephone,
                    'signature' => $signature,
                    'password' => Hash::make($request->password),
                    'updated_by' => auth()->user()->id,
                ];
            } else {
                $data = [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'telephone' => $request->telephone,
                    'password' => Hash::make($request->password),
                    'updated_by' => auth()->user()->id,
                ];
            }

            $userUpdated = $user->update($data);

            if($userUpdated){

                return $this->responseSuccess('Compte réinitialisé avec succès.', new UserResource($user));

            } 
        } else {
            return $this->responseNotFound('Utilisateur introuvable !');
        }

    }

    public function randomPassword() {
        $alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&^&*()-+={}[]:;<>?';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
}
