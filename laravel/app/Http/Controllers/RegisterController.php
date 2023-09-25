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

    /**
     * Display the specified resource.
     * @param  Integer $id
     * @return Response
     */
    public function show(int $id)
    {

        $client = $this->registerClient->find($id);
        if ($client === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($client, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param  Integer  $id
     * @param  Request  $request
     * @param registerClient  $client
     * @return Response
     */
    public function update(Request $request, registerClient $client, int $id)
    {
        $client = $this->registerClient->find($id);

        if ($request->method() === 'PATCH') {
            $client->update($request->only($this->registerClient->fillable));
        } else {
            $request->validate($this->registerClient->rules(), $this->registerClient->feedback());
            $client->update($request->all());
        }

        $client->fill($request->all());
        $client->save();
        
        return response()->json(['msg' => 'Recurso atualizado com sucesso'], 200);
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $client = $this->registerClient->find($id);

        if ($client === null) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $client->delete();
        return response()->json(['msg' => 'Recurso excluído com sucesso'], 200);
    }
}
