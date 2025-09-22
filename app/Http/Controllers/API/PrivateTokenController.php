<?php

namespace App\Http\Controllers\API;

use App\Actions\Auth\GenerateTokenAction;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class PrivateTokenController extends Controller
{
    /**
     * Générer un token d'accès pour un utilisateur
     */
    public function store(Request $request, GenerateTokenAction $generateToken): JsonResponse
    {
        $appId = $request->header('X-App-Id');

        abort_unless($appId !== null, HttpFoundationResponse::HTTP_FORBIDDEN);

        $user = User::where('username', $request->username)->first();

        if (! $user) {
            throw new UnprocessableEntityHttpException("L'identifiant de l'utilisateur est invalide");
        }

        $data = $generateToken->execute($user, 'eAtCI Overlay', null);

        return response()->json($data);
    }
}
