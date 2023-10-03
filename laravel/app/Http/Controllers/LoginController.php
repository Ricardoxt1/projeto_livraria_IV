<?php

namespace App\Http\Controllers;

use App\Models\RegisterClient;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $erro = '';
        $sucess = '';

        if ($erro = $request->get('erro')) {
            $erro = 'Usuário ou senha não existe';
        } elseif ($sucess = $request->get('sucess')) {
            $sucess = 'Registro realizado com sucesso';
        } elseif ($erro = $request->get('erro1')) {
            $erro = 'Necessário estar logado para efetuar o acesso!';
        }

        return view('site.client.login', ['titulo' => 'Login', 'erro' => $erro, 'sucess' => $sucess]);
    }

    /**
     * Authenticates a user based on the provided request and register client.
     *
     * @param Request $request The request object containing user input.
     * @param RegisterClient $registerClient The register client used to query the user data.
     * @return RedirectResponse Redirects the user to a specific route based on the authentication result.
     */
    public function authenticate(Request $request, RegisterClient $registerClient)
    {

        $regras = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',

        ];

        $request->validate($regras, $feedback);

        $email = $request->input('email');
        $register = new $registerClient();
        $client = $register->where('email', $email)->first();


        if ($client && Hash::check($request->input('password'), $client->password)) {
            session_start();
            $_SESSION['username'] = $client->username;
            $_SESSION['email'] = $client->email;

            return redirect()->route('site.menu', ['sucess' => '2']);
        } else {
            return redirect()->route('site.login', ['erro' => '1']);
        }
    }

    /**
     * Log out the user.
     *
     * @return RedirectResponse
     */
    public function logout()
    {
        session_destroy();

        return redirect()->route('site.login');
    }
}
