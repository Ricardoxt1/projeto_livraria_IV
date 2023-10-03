<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;


class UserController extends Controller
{
    private $user;

    /**
     * Constructs a new instance of the class.
     * @param UserController $client The user object.
     */
    public function __construct(UserController $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $client = $this->user->all();
        return response()->json($client, 200, ['msg' => 'Recurso listado com sucesso']);
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->user->rules(), $this->user->feedback());

        $client = new $this->user();
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->save();

        return response()->json($client, 201);
    }
}
