<?php

namespace App\Http\Controllers;
use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departamentos = Departamento::with('pais')->get();
        if ($departamentos->isEmpty()) {
            return response()->json(['mensaje' => 'Sin registros ingresados'], 404);
        }
        return response()->json($departamentos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais_id' => 'required|exists:paises,id',
        ]);

        $departamento = Departamento::create($validated);
        return response()->json($departamento, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_departamento)
    {
        $departamento = Departamento::find($id_departamento);
        return response()->json($departamento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departamento $departamento)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais_id' => 'required|exists:paises,id',
        ]);

        $departamento->update($validated);
        return response()->json($departamento);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(null, 204);
    }
}
