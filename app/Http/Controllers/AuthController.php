<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario'       => 'required|string',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $credentials = request(['usuario', 'password']);
        if (!Auth::attempt($credentials)) {
            return $this->errorResponse('Error de Credenciales', 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();

        $persona = ''; //Por implementar

        return response()->json([
            'usuario' => $user,
            'persona' => $persona,
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse(
                $tokenResult->token->expires_at)
                ->toDateTimeString(),
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return $this->showMessage('Logout exitoso!', 200);
    }

    public function user(Request $request)
    {
        return $this->showOne($request->user());
    }
}
