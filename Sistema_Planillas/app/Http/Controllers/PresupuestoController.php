<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuesto;

class PresupuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presupuestos = Presupuesto::with('unidadOrganizativa')->get();
        return response()->json($presupuestos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_unidad_organizativa' => 'required|exists:unidades_organizativas,codigo_unidad',
            'monto' => 'required|numeric'
        ]);

        $presupuesto = Presupuesto::create($request->all());
        return response()->json($presupuesto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $presupuesto = Presupuesto::with('unidadOrganizativa')->findOrFail($id);
        return response()->json($presupuesto);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'monto' => 'required|numeric'
        ]);

        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->update($request->all());
        return response()->json($presupuesto);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presupuesto = Presupuesto::findOrFail($id);
        $presupuesto->delete();
        return response()->json(null, 204);
    }
}
