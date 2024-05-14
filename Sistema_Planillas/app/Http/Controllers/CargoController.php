<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::all();
        return response()->json($cargos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // Validación de los datos
        ]);

        $cargo = Cargo::create($validatedData);
        return response()->json($cargo, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        return response()->json($cargo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            // Validación de los datos
        ]);

        $cargo = Cargo::findOrFail($id);
        $cargo->update($validatedData);
        return response()->json($cargo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cargo = Cargo::findOrFail($id);
        $cargo->delete();
        return response()->json(null, 204);
    }
}
