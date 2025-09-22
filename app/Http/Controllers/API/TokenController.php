<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\GenerateTokenAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * @group Authentification
 */
class TokenController extends Controller
{
    /**
     * Générer un token d'accès pour un utilisateur
     *
     * Le client_name est optionnel, mais il doit être présent si le client souhaite nommer la clé générée.
     */
    public function store(AuthRequest $request, GenerateTokenAction $generateToken): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->input('password'), $user->password)) {
            throw new UnprocessableEntityHttpException('Adresse e-mail ou mot de passe invalide');
        }

        $expiresAt = $request->input('expires_at', config('auth.token_expires_hours'));
        $tokenName = $request->input('client_name', 'api_token');

        $data = $generateToken->execute($user, $tokenName, $expiresAt);

        return response()->json($data);
    }

    /**
     * Supprimer le token d'accès de l'utilisateur
     *
     * Cette route est utilisée par le middleware de l'authentification pour supprimer le token d'authentification de l'utilisateur quand il se déconnecte.
     */
    public function destroy(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();
        $user->currentAccessToken()->delete();

        return $this->responseWithCustomError('Déconnexion effectuée avec succès ', null, HttpFoundationResponse::HTTP_NO_CONTENT);
    }

    /**
     * Récupérer les tokens d'accès de l'utilisateur
     */
    public function fetch(): JsonResponse
    {
        /** @var User $user */
        $user = auth()->user();

        $tokens = $user->tokens
            ->map(function (PersonalAccessToken $token) {
                return [
                    'id' => $token->id,
                    'name' => $token->name,
                    'expires_at' => $token->expires_at,
                    'last_used_at' => $token->last_used_at,
                    'created_at' => $token->created_at,
                ];
            })
            // only get un-expired tokens
            ->reject(fn (array $token) => now() >= $token['expires_at'])
            ->values();

        return $this->responseSuccess(null, ['data' => $tokens->toArray()]);
    }

    /**
     * Supprimer les tokens d'accès de l'utilisateur
     */
    public function revoke(AuthRequest $request): JsonResponse
    {
        $tokensToRevoke = $request->get('token_ids');

        // delete everything if they pass a star (*)
        if ($tokensToRevoke === ['*']) {
            auth()->user()->tokens()->delete();

            return $this->responseDeleted();
        }

        foreach ($tokensToRevoke as $tokenId) {
            auth()->user()->tokens()->where('id', $tokenId)->delete();
        }

        return $this->responseDeleted();
    }
}
