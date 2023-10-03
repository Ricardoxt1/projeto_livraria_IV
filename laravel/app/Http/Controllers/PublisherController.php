<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;


class PublisherController extends Controller
{
    private $publisher;

    /**
     * Constructs a new instance of the class.
     * @param Publisher $publisher The publisher object.
     */
    public function __construct(Publisher $publisher): void
    {
        $this->publisher = $publisher;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $publishers = $this->publisher->with('books')->get();
        return response()->json($publishers, 200, ['msg' => 'Recurso listado com sucesso']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->publisher->rules(), $this->publisher->feedback());
        $publisher = $this->publisher->create($request->all());
        return response()->json($publisher, 201, ['msg' => 'Recurso criado com sucesso']);
    }

    /**
     * Display the specified resource.
     * @param Int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $publishers = $this->publisher->with('books')->find($id);
        if (is_null($publishers)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($publishers, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request  $request
     * @param Int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
   
        $publisher = $this->publisher->find($id);
        
        if (is_null($publisher)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {
            $publisher->update($request->only($this->publisher->fillable));
        } else {
            $request->validate($this->publisher->rules(), $this->publisher->feedback());
            $publisher->update($request->all());
        }
       
        return response()->json($publisher, 200, ['msg' => 'Recurso atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $publisher = $this->publisher->find($id);
        if (is_null($publisher)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $associated = $publisher->books()->exists();
        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso está associado ao(s) livro(s).'], 400);
        }

        $publisher->delete();
        return response()->json(['msg' => 'Recurso excuído com sucesso'], 200);
    }
}
