<?php

namespace App\Http\Middleware;


use App\Repositories\PermissionRepository;
use Closure;

class VerifyPermissions
{
    protected $permissionRepository;

    public function __construct(PermissionRepository $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->permissionRepository->getAllPermissions();

        return $next($request);
    }
}