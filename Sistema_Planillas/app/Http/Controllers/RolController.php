<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
{
    function __construct(){
        $this->middleware('permission:ver-rol | crear-rol | editar-rol | borrar-rol',['only'=>['index']]);
        $this->middleware('permission:crear-rol',['only'=>['create','store']]);
        $this->middleware('permission:editar-rol',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-rol',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = DB::table('roles')->paginate(10);
        $data=[
            'roles'=>$roles,
            'status'=>200
        ];

        return response()->json($data, 200);
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
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission);

        $data=[
            'message'=>'Rol creado con éxito',
            'status'=>201
        ];

        return response()->json($data, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $data=[
            'role'=>$role,
            'permissions'=>$permissions,
            'rolePermissions'=>$rolePermissions,
            'status'=>200
        ];

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission);

        $data=[
            'message'=>'Rol actualizado con éxito',
            'status'=>200
        ];

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('roles')->where('id', $id)->delete($id);

        $data=[
            'message'=>'Rol eliminado con éxito',
            'status'=>204
        ];

        return response()->json($data, 204);
    }
}
