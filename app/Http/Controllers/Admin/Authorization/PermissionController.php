<?php

namespace App\Http\Controllers\Admin\Authorization;

use App\Models\Permission;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.authorization.permission.index', [
            'permissions' => $permissions
        ]);
    }

    public function create()
    {
        return view('admin.authorization.permission.create');
    }

    public function store(Request $request)
    {
        Permission::create([
            'name' => $request['name'],
            'description' => $request['description']
        ]);

        return redirect('admin/permisos');
    }
}
