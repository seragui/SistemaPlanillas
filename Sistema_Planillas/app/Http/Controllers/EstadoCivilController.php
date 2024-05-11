<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EstadoCivil;

class EstadoCivilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadosCiviles = EstadoCivil::all();
        if ($estadosCiviles->isEmpty()) {
            return response()->json(['mensaje' => 'Sin registros ingresados'], 404);
        }
        return response()->json($estadosCiviles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'descripcion' => 'required|string|max:100|unique:estados_civiles,descripcion',
        ]);

        $estadoCivil = EstadoCivil::create($validated);
        return response()->json($estadoCivil, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_estado_civil)
    {
        $estadoCivil = EstadoCivil::find($id_estado_civil);
        return response()->json($estadoCivil);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_estado_civil)
    {
        $estadoCivil = EstadoCivil::find($id_estado_civil);
        
        if(!$estadoCivil){
            $data=[
                'message'=>'Estado civil no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $estadoCivil->descripcion=$request->descripcion;

        $estadoCivil->save();

        $data=[
            'profesion'=>$estadoCivil,
            'status'=>200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EstadoCivil $estadoCivil)
    {
        $estadoCivil->delete();
        return response()->json(null, 204);
    }
}
