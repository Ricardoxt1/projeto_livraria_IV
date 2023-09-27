<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    private $author;

    /**
     * Constructs a new instance of the class.
     * @param Author $author The author object.
     */
    public function __construct(Author $author)
    {
        $this->author = $author;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $authors = $this->author->with('books')->get();
        return response()->json($authors, 200, ['msg' => 'Recurso listado com sucesso']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Author $author
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request, Author $author)
    {
        $request->validate($this->author->rules(), $this->author->feedback());
        $author = $this->author->create($request->all());

        return response()->json($author, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer $id
     * @return Response
     */
    public function show(int $id)
    {
        $author = $this->author->with('books')->find($id);
        if (is_null($author)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($author, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param Author  $author
     * @return Response
     */
    public function update(Request $request, Author $author)
    {

        if ($request->method() === 'PATCH') {
            $author->update($request->only($this->author->fillable));
        } else {
            $request->validate($this->author->rules(), $this->author->feedback());
            $author->update($request->all());
        }

        
        
        return response()->json($author, 200, ['msg' => 'Autor(a) atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Integer  $id
     * @return Response
     */
    public function destroy(int $id)
    {
        $author = $this->author->find($id);

        if (is_null($author)) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        // Check if the author is associated with books or rentals
        $associated = $author->books()->exists();

        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O autor está associado a livros.'], 400);
        }

        $author->delete();
        return response()->json(['msg' => 'Recurso excluído com sucesso'], 200);
    }
}
