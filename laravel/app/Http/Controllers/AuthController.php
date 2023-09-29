<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    /**
     * Authenticates a user based on the provided credentials.
     *
     * @param Request $request The HTTP request object containing the email and password.
     * @return string The result of the login process.
     */
    public function login(Request $request)
    {
        $credential = $request->all('email', 'password');
        $token = auth('api')->attempt($credential);

        if($token){
            return response()->json([
                'token' => $token
            ]);
        } else {
            return response()->json([
                'error' => 'Credencial inválida'
            ], 403);
        }

        return 'login';
    }


    public function logout()
    {
        return 'logout';
    }


    public function refresh()
    {
        return 'refresh';
    }

    public function me()
    {
        return 'me';
    }
}
