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
    public function update(Request $request, $id)
    {
        // Validar la solicitud
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'pais_id' => 'required|exists:paises,id',
        ]);

        try {
            // Buscar el registro por ID
            $departamento = Departamento::findOrFail($id);

            // Actualizar el registro
            $departamento->update($validated);

            return response()->json($departamento);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al actualizar el departamento', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Buscar el registro por ID
            $departamento = Departamento::findOrFail($id);
    
            // Eliminar el registro
            $departamento->delete();
    
            return response()->json(['message' => 'Departamento eliminado correctamente'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Departamento no encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al eliminar el departamento', 'error' => $e->getMessage()], 500);
        }
    }
}
