<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use Hash;

//use App\Http\Requests\AuthenticateRequest;
use Validator;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // Pega email e password da request
        $credentials = $request->only('email', 'password');

        // Pega user pelo email
        $user = User::where('email', $credentials['email'])->first();

        // Validate User
        if (!$user) {
            return response()->json([
                'error' => 'Credenciais inválidas.'
            ], 401);
        }

        // Valida senha
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'error' => 'Credenciais inválidas.'
            ], 401);
        }

        // Generate Token
        $token = JWTAuth::fromUser($user);

        // Get expiration time
        $objectToken = JWTAuth::setToken($token);
        $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $expiration
        ]);
    }
}
