<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
   
    public function index()
    {          
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.index',compact('roles','permissions'));
    }
    
    
    public function create()
    {
        $permissions = Permission::get();
        return view('roles.create', compact('permissions'));
    }
      
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'permission' => 'required',
        ]);
        $input = $request->all();        
        $role = Role::create($input);

        $data = $role->syncPermissions($request->permission);
        return redirect()->route('roles.index');
    }
   
    public function show(Role $role)
    {
       //
    }

    public function edit(Role $role)
    {    
        return view('roles.edit', [
            'role' => $role,
            'rolePermissions' => $role->permissions->pluck('name')->toArray(),
            'permissions' => Permission::all(),
        ]);
    }   
       
    public function update(Role $role, Request $request)
    {
        $request->validate([
            'name' => 'required',
            'guard_name' => 'required',
            'permission' => 'required',
        ]);    
        $input = $request->all();
        $role->update($input);
        $data = $role->syncPermissions($request->permission);
        return redirect()->route('roles.index');       
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');
    }
}
