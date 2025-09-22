<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\ForgetOneTimePassword;
use App\Actions\Auth\GenerateOneTimePassword;
use App\Actions\Auth\VerifyOneTimePassword;
use App\Events\Auth\OtpAuthenticationChallenged;
use App\Http\Controllers\Controller;
use App\Http\Requests\OtpRequest;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

/**
 * @group Authentification
 */
class OtpController extends Controller
{
    public function __construct(protected StatefulGuard $guard) {}

    /**
     * Valider un code OTP
     *
     * @unauthenticated
     */
    public function match(OtpRequest $request, VerifyOneTimePassword $verifyOneTimePassword): JsonResponse
    {
        $user = $request->challengedUser();

        throw_unless($verifyOneTimePassword->execute($request->code, $user->otpKey()), ValidationException::withMessages(['code' => ['Le code OTP est invalide.']]));

        $this->guard->login($user, $request->remember());

        $request->session()->regenerate();

        return $this->responseSuccess('Vérification OTP réussie');
    }

    /**
     * Renvoyer un code OTP à l'utilisateur
     *
     * @unauthenticated
     */
    public function resend(OtpRequest $request, GenerateOneTimePassword $generateOneTimePassword, ForgetOneTimePassword $forgetOneTimePassword): JsonResponse
    {
        $user = $request->challengedUser();

        $forgetOneTimePassword->execute($user->otpKey());

        OtpAuthenticationChallenged::dispatch($user, $generateOneTimePassword->execute($user->otpKey()));

        return $this->responseSuccess('Code OTP envoyé à votre adresse e-mail');
    }
}
