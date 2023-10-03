<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RentalController extends Controller
{
    private $rental;

    /**
     * Constructs a new instance of the class.
     * @param Rental $rental The rental object.
     */
    public function __construct(Rental $rental): void
    {
        $this->rental = $rental;
    }

    /**
     * Display a listing of the resource.
     * @param Rental $rental
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $rentals = $this->rental->with('book', 'customer', 'employee')->get();
        return response()->json($rentals, 200, ['msg' => 'Recurso listado com sucesso.']);
    }

    /**
     * Store the form for creating a new rental.
     * @param Rental $rental
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->rental->rules(), $this->rental->feedback());
        $rental = $this->rental->create($request->all());

        return response()->json($rental, 201, ['msg' => 'Recurso cadastrado com sucesso.']);
    }

    /**
     * Display the specified resource.
     * @param  Int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $rental = $this->rental->find($id);
        if (is_null($rental)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($rental, 200, ['msg' => 'Recurso listado com sucesso.']);
    }

    /**
     * Update the specified resource in storage.
     * @param Request  $request
     * @param Int $id
     * @return JsonResponse
     */
    public function update(Request $request,int $id): JsonResponse
    {
        $rental = $this->rental->find($id);

        if (is_null($rental)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {
            $rental->update($request->only($this->rental->fillable));
        } else {
            $request->validate($this->rental->rules(), $this->rental->feedback());
            $rental->update($request->all());
        }

        return response()->json($rental, 200, ['msg' => 'Recurso atualizado com sucesso.']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $rental = $this->rental->find($id);
        if (is_null($rental)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $rental->delete();
        return response()->json(['msg' => 'Recurso removido com sucesso.'], 200);
    }
}
