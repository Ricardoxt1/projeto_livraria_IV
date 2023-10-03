<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeeController extends Controller
{
    private $employee;

    /**
     * Constructs a new instance of the class.
     *
     * @param Employee $employee The employee object.
     */
    public function __construct(Employee $employee): void
    {
        $this->employee = $employee;
    }

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $employees = $this->employee->with('library')->get();
        return response()->json($employees, 200, ['msg' => 'Recurso listado com sucesso']);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate($this->employee->rules(), $this->employee->feedback());
        $employees = $this->employee->create($request->all());

        return response()->json($employees, 201);
    }

    /**
     * Display the specified resource.
     * @param  Int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $employee = $this->employee->with('library')->find($id);
        if (is_null($employee)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Int $id
     * @return JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $employee = $this->employee->find($id);
        if (is_null($employee)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {
            $employee->update($request->only($this->employee->fillable));
        } else {
            $request->validate($this->employee->rules(), $this->employee->feedback());
            $employee->update($request->all());
        }

        return response()->json($employee, 200, ['msg' => 'Recurso atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     * @param Int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $employee = $this->employee->find($id);
        if (is_null($employee)) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        $associated = $employee->rentals()->exists();
        if ($associated) {
            return response()->json(['erro' => 'Impossível realizar a exclusão. O recurso está associado a alugueis.'], 400);
        }

        $employee->delete();

        return response()->json(['msg' => 'Recurso excuído com sucesso'], 200);
    }
}
