<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use \Illuminate\Http\Response;
use App\Models\RegisterClient;

class RegisterController extends Controller
{
    private $registerClient;

    /**
     * Constructs a new instance of the class.
     * @param RegisterClient $client The registerClient object.
     */
    public function __construct(RegisterClient $registerClient)
    {
        $this->registerClient = $registerClient;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $client = $this->registerClient->all();
        return response()->json($client, 200, ['msg' => 'Recurso listado com sucesso']);
    }


    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->registerClient->rules(), $this->registerClient->feedback());

        $client = new $this->registerClient();
        $client->username = $request->username;
        $client->email = $request->email;
        $client->password = Hash::make($request->password);
        $client->save();

        return response()->json($client, 201);
    }
}
