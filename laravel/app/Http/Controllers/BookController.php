<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    private $book;

    /**
     * Create a new instance of the class.
     * @param Book $book The book object to be assigned to the instance.
     */
    public function __construct(Book $book): void
    {
        $this->book = $book;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $book = $this->book->with('author', 'publisher', 'library')->get();
        return response()->json($book, 200, ['msg' => 'Recurso listado com sucesso.']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->book->rules(), $this->book->feedback());
        $image = $request->file('image');
        $image_urn = $image->store('books', 'public');

        $book = $this->book->create([
            'author_id'     => $request->input('author_id'),
            'publisher_id'  => $request->input('publisher_id'),
            'library_id'    => $request->input('library_id'),
            'titule'        => $request->input('titule'),
            'page'          => $request->input('page'),
            'realese_date'  => $request->input('realese_date'),
            'image'         => $image_urn
        ]);
        return response()->json($book, 201, ['msg' => 'Recurso criado com sucesso.']);
    }

    /**
     * Display the specified resource.
     * @param  Int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $book = $this->book->with('author', 'publisher', 'library')->find($id);
        if (is_null($book)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($book, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request  $request
     * @param Int $id
     * @param Storage $storage
     * @return JsonResponse
     */
    public function update(Request $request, Storage $storage, int $id): JsonResponse
    {
        $book = $this->book->find($id);
        if (is_null($book)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }


        if ($request->method() === 'PATCH') {
            $book->update($request->only($this->book->fillable));
        } else {
            $request->validate($this->book->rules(), $this->book->feedback());
            $book->update($request->all());
        }

        if ($request->file('image')) {
            $storage::disk('public')->delete($book->image);
        }

        $image = $request->file('image');
        $image_urn = $image->store('books', 'public');

        $book->fill($request->all());
        $book->image = $image_urn;
        $book->save();

        return response()->json($book, 200, ['msg' => 'Recurso atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Int $id
     * @param Storage $storage
     * @return JsonResponse
     */
    public function destroy(Storage $storage, int $id): JsonResponse
    {
        $book = $this->book->find($id);

        if (is_null($book)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $associated = $book->rentals()->exists();

        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O livro está associado a alugueis.'], 400);
        }

        $storage::disk('public')->delete($book->image);
        $book->delete();

        return response()->json(['msg' => 'Recurso excluído com sucesso.'], 200);
    }
}
