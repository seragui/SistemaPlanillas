<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesion;
use Illuminate\Http\Response;

class ProfesionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profesiones = Profesion::all();
        return response()->json($profesiones);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
        ]);

        $profesion = Profesion::create($request->all());
        return response()->json($profesion, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_profesion)
    {
        $profesion = Profesion::find($id_profesion);
        return response()->json($profesion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_profesion)
    {
        $profesion = Profesion::find($id_profesion);
        
        if(!$profesion){
            $data=[
                'message'=>'Profesion no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $profesion->descripcion=$request->descripcion;

        $profesion->save();

        $data=[
            'profesion'=>$profesion,
            'status'=>200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profesion $profesion)
    {
        $profesion->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
