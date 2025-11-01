<?php

namespace App\Http\Controllers\API;

use App\Models\City;
use App\Models\User;
use App\Models\Entity;
use App\Models\Country;
use App\Enums\StatusEnum;
use App\Models\AppSetting;
use App\Models\UserAction;
use Illuminate\Support\Str;
use Jenssegers\Agent\Agent;
use App\Jobs\SendOtpMailJob;
use Illuminate\Http\Request;
use App\Enums\PermissionEnum;
use App\Models\UserActionType;
use App\Models\PasswordHistory;
use App\Models\PurchaseRequest;
use App\Services\Agent\GetAgent;
use App\Enums\UserActionTypeEnum;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Essa\APIToolKit\Api\ApiResponse;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\OtpRequest;
use App\Http\Requests\Auth\AuthRequest;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\User\UserResource;
use Spatie\Permission\PermissionRegistrar;
use App\Http\Requests\Auth\OtpResendRequest;
use App\Http\Requests\Auth\AuthFirstLoginRequest;
use App\Http\Resources\Permission\PermissionResource;

/**
 * @group Auth
 *
 * Auth API
 */
class AuthController extends Controller
{
    use ApiResponse;

    public function logAction(?User $user, string $description, string $status)
    {
        $getAgent = app(GetAgent::class);
        $agentInfo = $getAgent->getAgentInfo();
        UserAction::create([
            'ip_address' => $agentInfo['ip'],
            'user_agent' => $agentInfo['user_agent'],
            'browser' => $agentInfo['browser'],
            'platform' => $agentInfo['platform'],
            'device' => $agentInfo['device'],
            'version' => $agentInfo['version'],
            'user_id' => $user ? $user->id : null,
            'user_action_type_id' => UserActionType::where('code', UserActionTypeEnum::LOGIN_USER->value)->first()->id ?? null,
            'description' => $description,
            'status' => $status,
        ]);
    }

    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'username' => Str::random(10),
            'code' => Str::random(10),
            'email' => $request->email,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'telephone' => $request->telephone,
            'current_role_id' => Role::where('name', RoleEnum::CLIENT->value)->first()->id,
            'password' => Hash::make($request->password),
            'status_id' => Status::where('code', StatusEnum::ACTIVE->value)->first()->id,
        ])->assignRole(Role::where('name', RoleEnum::CLIENT->value)->first()->id);

        app(PermissionRegistrar::class)->setPermissionsTeamId($user->current_role_id);
        $user->assignRole(Role::where('name', RoleEnum::CLIENT->value)->first()->name);

        return $this->responseSuccess('Utilisateur créé avec succès', [
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    /**
     * Get a new Bearer token
     *
     * @param AuthRequest $request
     * @return void
     * @unauthenticated
     */
    public function login(AuthRequest $request)
    {
        $user = User::where('email', $request->all()['email'])
            ->first();

        // Check Password
        if(!$user || !Hash::check($request->all()['password'], $user->password)){
            if (!$user) {
                $this->logAction(null, "Tentative de connexion", StatusEnum::FAILED->value);
                return $this->responseNotFound(['error' => 'Identifiants de connexion invalides.']);
            } 

            $user->login_attempt++;
            $user->save();

            if($user->login_attempt >= (int) AppSetting::where('code', 'attemp_login_limit')->first()->value){
                $this->logAction($user, "Tentative de connexion", StatusEnum::FAILED->value);
                $user->login_attempt = 0;
                $user->status = StatusEnum::INACTIVE->value;
                $user->save();
                return $this->responseUnprocessable(['error' => 'Vous avez atteint le nombre maximum de tentatives de connexion. Veuillez vous rapprocher de votre administrateur.']);
            }

            $this->logAction($user, "Tentative de connexion", StatusEnum::FAILED->value);

            return $this->responseUnprocessable(['error' => 'Identifiants de connexion invalides, vous avez ' . ((int) AppSetting::where('code', 'attemp_login_limit')->first()->value - $user->login_attempt) . ' tentatives de connexion restantes.']);
        }

        if ($user->status == StatusEnum::INACTIVE->value) {
            $this->logAction($user, "Tentative de connexion", StatusEnum::FAILED->value);
            return response()->json(['error' => "Désolé, votre compte a été désactivé !"], 401);
        } 

        if($user->first_login){
            $this->logAction($user, "Tentative de connexion avec avec modification de mot de passe", StatusEnum::SUCCESS->value);
            return $this->responseSuccess('Veuillez modifier votre mot de passe pour continuer.', [
                'first_login' => $user->first_login == 1 ? true : false,
            ]);
        } 

        if(AppSetting::where('code', '2_fa_status')->first()->value == "true"){
            $pin_code = rand(100000, 999999);
            $user->pin_code = $pin_code;
            $user->pin_code_params = Str::random(50);
            $user->pin_code_expires_at = now()->addMinutes((int) AppSetting::where('code', '2_fa_expiry_minutes')->first()->value);
            $user->save();

            $this->logAction($user, "Tentative de connexion avec 2FA", StatusEnum::SUCCESS->value);
            
            dispatch(new SendOtpMailJob($user));
            return $this->responseSuccess('Votre code de vérification a été envoyé avec succès à votre email, veuillez le saisir pour continuer.');
        } else {
            $user->login_attempt = 0;
            $user->save();

            $this->logAction($user, "Tentative de connexion", StatusEnum::SUCCESS->value);

            return $this->responseSuccess('', [
                'token' => $user->createToken('auth_token')->plainTextToken,
            ]);
        }
    }

    public function firstLogin(AuthFirstLoginRequest $request)
    {         
        if($request->new_password != $request->new_password_confirmation){
            $this->loginActionWithoutUser(null, "Tentative de première connexion", StatusEnum::FAILED->value);
            return $this->responseNotFound('Les nouveaux mots de passe ne correspondent pas');
        }

        $user = User::where('email', $request->all()['email'])
            ->firstOrFail();

        $password_histories = PasswordHistory::where('user_id', $user->id)->latest('password_histories.created_at')->get()->take((int) AppSetting::where('code', 'password_history_limit')->first()->value)->pluck('password');

        foreach($password_histories as $password_history){
            if(Hash::check($request->new_password, $password_history)){
                $this->logAction($user, "Tentative de première connexion avec un mot de passe figurant dans vos " . (int) AppSetting::where('code', 'password_history_limit')->first()->value . " derniers mots de passe", StatusEnum::FAILED->value);
                return $this->responseUnprocessable('Le nouveau mot de passe doit être différent de vos ' . (int) AppSetting::where('code', 'password_history_limit')->first()->value . ' derniers mots de passe');
            }
        }

        // Check Password
        if (!$user || !Hash::check($request->all()['password'], $user->password)) {
            return $this->responseNotFound(['error' => 'Identifiants de connexion invalides']);
        }

        if ($user->status == StatusEnum::INACTIVE->value) {
            return $this->responseUnprocessable(['error' => "Désolé, votre compte a été désactivé !"]);
        }

        $user->first_login = false;
        $user->password = Hash::make($request->new_password);
        $user->save();

        if(AppSetting::where('code', '2_fa_status')->first()->value == "true"){
            $pin_code = rand(100000, 999999);
            $user->pin_code = $pin_code;
            $user->pin_code_params = Str::random(50);
            $user->pin_code_expires_at = now()->addMinutes((int) AppSetting::where('code', '2_fa_expiry_minutes')->first()->value);
            $user->save();

            $this->logAction($user, "Tentative de première connexion avec 2FA", StatusEnum::SUCCESS->value);

            dispatch(new SendOtpMailJob($user));
            return $this->responseSuccess('Votre code de vérification a été envoyé avec succès à votre email, veuillez le saisir pour continuer.');
        }

        PasswordHistory::create([
            'user_id' => $user->id,
            'password' => Hash::make($request->new_password),
            'status' => StatusEnum::ACTIVE->value,
            'created_by' => $user->id,
            'updated_by' => $user->id,
        ]);

        $this->logAction($user, "Tentative de première connexion avec modification de mot de passe", StatusEnum::SUCCESS->value);

        return $this->responseSuccess('', [
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function otpValidate(OtpRequest $request)
    {
        $user = User::where(['email' => $request->email, 'pin_code' => $request->pin_code])->firstOrFail();

        if (!$user) {
            return $this->responseNotFound('Code de vérification invalide');
        } 

        if($user->pin_code_expires_at < now()){
            $this->logAction($user, "Validation de 2FA avec code expiré", Status::where('code', StatusEnum::FAILED->value)->first()->id);
            return $this->responseUnprocessable('Code de vérification expiré. Veuillez vous reconnecter.');
        }

        $this->logAction($user, "Validation de 2FA", Status::where('code', StatusEnum::SUCCESS->value)->first()->id);

        return $this->responseSuccess('', [
            'token' => $user->createToken('auth_token')->plainTextToken,
        ]);
    }

    public function otpResend(OtpResendRequest $request)
    {
        $user = User::where('email', $request->all()['email'])
            ->firstOrFail();

        if($user->pin_code_expires_at < now()){
            $this->logAction($user, "Renvoi de code de vérification avec code expiré", Status::where('code', StatusEnum::FAILED->value)->first()->id);
            return $this->responseNotFound('Vous n\'avez pas de code de vérification valide. Veuillez vous reconnecter.');
        }

        $this->logAction($user, "Renvoi de code de vérification", Status::where('code', StatusEnum::SUCCESS->value)->first()->id);

        dispatch(new SendOtpMailJob($user));
        return $this->responseSuccess('Votre code de vérification a été renvoyé avec succès à votre email, veuillez le saisir pour continuer.', null);
    }

    /**
     * Current Auth User
     *
     * @authenticated
     */
    public function getCurrentUserAuth()
    {
        $this->authorize('viewAny', User::class);

        return $this->responseSuccess(null, new UserResource(auth()->user()->load('currentRole', 'status', 'permissions', 'entity', 'entity.entityType')));
    }



    public function logout()
    {
        $this->logAction(auth()->user(), "Déconnexion", Status::where('code', StatusEnum::SUCCESS->value)->first()->id);
        auth()->user()->tokens()->delete();
        return $this->responseSuccess('Déconnexion réussie', null);
    }
}
