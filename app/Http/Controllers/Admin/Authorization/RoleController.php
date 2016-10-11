<?php

namespace App\Http\Controllers\Admin\Authorization;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.authorization.roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        return view('admin.authorization.roles.create');
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request['name'],
            'description' => $request['description'],
        ]);

        return redirect('admin/roles');
    }

    public function edit($role_id)
    {
        $role = Role::with('permissions')->where('id', $role_id)->get()->first();
        
        return view('admin.authorization.roles.edit', [
            'role' => $role
        ]);
    }

    public function update(Request $request, $role_id)
    {
        $role = Role::find($role_id);

        $role->name = $request['name'];
        $role->description = $request['description'];

        $role->save();

        return redirect('admin/roles');
    }

    public function permissionsGranted($role_id)
    {
        $role = Role::with('permissions')->where('id', $role_id)->get()->first();

        return view('admin.authorization.roles.permissions-granted', [
            'role' => $role
        ]);
    }

    public function showGivePermission($role_id)
    {
        $role = Role::with('permissions')->where('id', $role_id)->get()->first();

        $permissions = Permission::all();

        return view('admin.authorization.roles.give-permission', [
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function givePermissionTo($role_id, $permission_id)
    {
        $role = Role::find($role_id);

        $permission = Permission::find($permission_id);

        $role->givePermissionTo($permission);

        return redirect('admin/roles/asignar-permiso/' . $role_id);
    }

    public function detachPermissionTo($role_id, $permission_id)
    {
        $role = Role::find($role_id);

        $role->detachPermissionTo($permission_id);

        return redirect('admin/roles/permisos-asignados/' . $role_id);
    }

    public function delete($role_id)
    {
        Role::destroy($role_id);

        return redirect('admin/roles');
    }
}
