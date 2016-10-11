@extends('layouts.app')

@section('htmlheader_title')
    Permisos otorgados
@endsection

@section('contentheader_title')
    Permisos otorgados a {{ $role->name }}
@endsection

@section('contentheader_menu')
    @can('can_give_permissions')
        <a href="/admin/roles/asignar-permiso/{{ $role->id }}" class="btn btn-success"><i class="fa fa-unlock" aria-hidden="true"></i> Asignar nuevo permiso</a>
    @endcan
    <a href="/admin/roles" class="btn btn-primary">Volver listado de roles</a>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Permisos otorgados a {{ $role->name }}</div>

                    <div class="panel-body">
                        @can('see_permissions_table')
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Fecha alta</th>
                                    @can('can_detach_permissions')
                                        <th>Eliminar</th>
                                    @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($role->permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        @can('can_detach_permissions')
                                            <td>
                                                <form method="POST" action="/admin/roles/eliminar-permiso/{{ $role->id }}/{{ $permission->id }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
