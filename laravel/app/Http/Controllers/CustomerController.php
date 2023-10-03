<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    private $customer;

    /**
     * Initializes a new instance of the Customer class.
     *
     * @param Customer $customer The customer object.
     */
    public function __construct(Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customers = $this->customer->with('rentals')->get();
        return response()->json($customers, 200, ['msg' => 'Recurso listado com sucesso']);
    }


    /**
     * Store a newly created resource in storage.
     * @return Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->customer->rules(), $this->customer->feedback());
        $customers = $this->customer->create($request->all());
        return response()->json($customers, 201, ['msg' => 'Recurso criado com sucesso']);
    }

    /**
     * Display the specified resource.
     * @param  Int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $customer = $this->customer->with('rentals')->find($id);
        if (is_null($customer)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($customer, 200);
    }


    /**
     * Update the specified resource in storage.
     * @param  Customer  $customer
     * @param  Request  $request
     * @return JsonResponse
     */
    public function update(Request $request, Customer $customer): JsonResponse
    {
        if ($request->method() === 'PATCH') {
            $customer->update($request->only($this->customer->fillable));
        } else {
            $request->validate($this->customer->rules(), $this->customer->feedback());
            $customer->update($request->all());
        }
        return response()->json($customer, 200, ['msg' => 'Usuário(a) atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Int  $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $customer = $this->customer->find($id);
        if (is_null($customer)) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso solicitado não existe'], 404);
        }

        $associated = $customer->rentals()->exists();
        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O cliente está associado a alugueis.'], 400);
        }

        $customer->delete();
        return response()->json(['msg' => 'Recurso excluído com sucesso'], 200);
    }
}
