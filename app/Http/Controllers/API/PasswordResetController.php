<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

/**
 * @group Authentification
 */
class PasswordResetController extends Controller
{
    /**
     * Demande de réinitialisation du mot de passe
     *
     * @unauthenticated
     */
    public function forgotPassword(AuthRequest $request): JsonResponse
    {
        $status = Password::sendResetLink($request->only('email'));

        if ($status !== Password::RESET_LINK_SENT) {
            throw new UnprocessableEntityHttpException("Impossible d'envoyer l'email de réinitialisation du mot de passe");
        }

        $data = ['email' => $request->get('email')];

        return $this->responseSuccess('La demande de réinitialisation a été envoyée', $data);
    }

    /**
     * Réinitialiser le mot de passe
     *
     * @unauthenticated
     */
    public function resetPassword(AuthRequest $request): JsonResponse
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = $password;
                $user->setRememberToken(Str::random(60));
                $user->save();
            }
        );

        if ($status !== Password::PASSWORD_RESET) {
            throw new BadRequestHttpException('La réinitialisation du mot de passe a échouée.');
        }

        return $this->responseSuccess('Le mot de passe a été réinitialisé avec succès.');
    }
}
