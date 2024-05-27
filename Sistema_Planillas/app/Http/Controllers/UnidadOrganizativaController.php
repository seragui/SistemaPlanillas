<?php

namespace App\Http\Controllers;

use App\Models\UnidadOrganizativa;
use Illuminate\Http\Request;

class UnidadOrganizativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = UnidadOrganizativa::with('unidadPadre', 'unidadesHijas')->get();
        return response()->json($unidades);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_organizacion' => 'required|exists:organizaciones,codigo_organizacion',
            'nombre_unidad' => 'required|max:100',
            'codigo_estructura' => 'nullable|exists:unidades_organizativas,codigo_unidad',
            'centro_costos' => 'required|max:100',
        ]);

        $unidad = UnidadOrganizativa::create($request->all());
        return response()->json($unidad, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $unidad = UnidadOrganizativa::with('unidadPadre', 'unidadesHijas')->findOrFail($id);
        return response()->json($unidad);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'codigo_organizacion' => 'required|exists:organizaciones,codigo_organizacion',
            'nombre_unidad' => 'required|max:100',
            'codigo_estructura' => 'nullable|exists:unidades_organizativas,codigo_unidad',
            'centro_costos' => 'required|max:100',
        ]);

        $unidad = UnidadOrganizativa::findOrFail($id);
        $unidad->update($request->all());
        return response()->json($unidad);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unidad = UnidadOrganizativa::findOrFail($id);
        $unidad->delete();
        return response()->json(null, 204);
    }
}
