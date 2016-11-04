<?php

namespace App\Repositories;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;

class PermissionRepository
{
    protected $permission;
    protected $gate;

    public function __construct(Permission $permission, Gate $gate)
    {
        $this->permission = $permission;
        $this->gate = $gate;
    }

    public function getAllPermissions()
    {
        foreach ($this->getPermissions() as $permission) {
            $this->gate->define($permission->name, function ($user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
    }

    private function getPermissions()
    {
        return $this->permission->with('roles')->get();
    }
}