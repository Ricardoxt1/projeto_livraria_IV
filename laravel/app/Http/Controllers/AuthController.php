<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use \Tymon\JWTAuth\Exceptions\TokenExpiredException;


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

        if ($token) {
            return response()->json([
                'token' => $token
            ]);
        } else {
            return response()->json([
                'error' => 'Credencial inválida'
            ], 403);
        }
    }

    /**
     * Logout the authenticated user.
     *
     * @throws Some_Exception_Class description of exception
     */
    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'message' => 'Logout realizado com sucesso!'
        ]);
    }


    /**
     * Refreshes the API token.
     *
     * @return JsonResponse The JSON response with the new token.
     */
    public function refresh()
    {   
        try {
            // Tente renovar o token
            $newToken = auth()->refresh();
            
            // A renovação foi bem-sucedida, envie o novo token de volta para o cliente
            return response()->json(['token' => $newToken], 200);
        } catch (TokenInvalidException $e) {
            // O token é inválido, então não pode ser renovado
            return response()->json(['error' => 'Token inválido'], 401);
        } catch (TokenExpiredException $e) {
            // O token expirou e não pode ser renovado, o usuário precisa fazer login novamente
            return response()->json(['error' => 'Token expirado'], 401);
        }
        
    }

    /**
     * Retrieves the currently authenticated user.
     *
     * @return JsonResponse The JSON response containing the authenticated user.
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
}
