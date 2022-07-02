<?php

namespace App\Http\Controllers;

date_default_timezone_set("Asia/Jakarta");

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => 'index', 'store']);
        $this->middleware('permission:role-create', ['only' => 'create', 'store']);
        $this->middleware('permission:role-edit', ['only' => 'edit', 'update']);
        $this->middleware('permission:role-delete', ['only' => 'destroy']);
    }

    public function index()
    {
        $roles = Role::orderBy('id', 'DESC')->get();

        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();

        return view('roles.create', compact('permission'));
    }

    public function show($id)
    {
        $role = Role::find($id);
        $rolePermission = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->get();
        return view('roles.show', compact('role', 'rolePermission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required'
        ]);

        $role = role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'The Role has been create successfully.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermission = Permission::join('role_has_permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
            ->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('roles.edit', compact('role', 'permission', 'rolePermission'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required'
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')->with('success', 'The User has been updated successfully');
    }

    public function destroy($id)
    {
        Role::find($id)->delete();
        return redirect()->route('roles.index')->with('success', 'The User has been updated successfully');
    }
}
