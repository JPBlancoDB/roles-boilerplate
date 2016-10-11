<?php

Route::get('inicio', 'Admin\HomeController@index');

Route::get('permisos', 'Admin\Authorization\PermissionController@index');
Route::get('permisos/crear', 'Admin\Authorization\PermissionController@create');
Route::post('permisos/crear', 'Admin\Authorization\PermissionController@store');

Route::get('roles', 'Admin\Authorization\RoleController@index');
Route::get('roles/crear', 'Admin\Authorization\RoleController@create');
Route::post('roles/crear', 'Admin\Authorization\RoleController@store');
Route::get('roles/editar/{role_id}', 'Admin\Authorization\RoleController@edit');
Route::post('roles/editar/{role_id}', 'Admin\Authorization\RoleController@update');
Route::get('roles/permisos-asignados/{role_id}', 'Admin\Authorization\RoleController@permissionsGranted');
Route::get('roles/asignar-permiso/{role_id}', 'Admin\Authorization\RoleController@showGivePermission');
Route::post('roles/asignar-permiso/{role_id}/{permission_id}', 'Admin\Authorization\RoleController@givePermissionTo');
Route::delete('roles/eliminar-permiso/{role_id}/{permission_id}', 'Admin\Authorization\RoleController@detachPermissionTo');
Route::delete('roles/eliminar/{role_id}', 'Admin\Authorization\RoleController@delete');