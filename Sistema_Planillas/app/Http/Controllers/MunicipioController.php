<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $municipios = Municipio::with('departamento')->get();
        if ($municipios->isEmpty()) {
            return response()->json(['mensaje' => 'Sin registros ingresados'], 404);
        }
        return response()->json($municipios);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $municipio = Municipio::create($validated);
        return response()->json($municipio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_municipio)
    {
        $municipio = Municipio::find($id_municipio);
        return response()->json($municipio);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Municipio $municipio)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $municipio->update($validated);
        return response()->json($municipio);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Municipio $municipio)
    {
        $municipio->delete();
        return response()->json(null, 204);
    }
}
