@extends('layouts.app')

@section('htmlheader_title')
    Editar rol
@endsection

@section('contentheader_title')
    Editar rol
@endsection

@section('contentheader_menu')
    <a href="/admin/roles" class="btn btn-primary">Volver listado de roles</a>
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Editar rol</div>

                    <div class="panel-body">
                        <form action="{{ $role->id }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nombre del rol" name="name" value="{{ $role->name }}"/>
                                <span class="fa fa-tag form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Descripci&oacute;n del rol" name="description" value="{{ $role->description }}"/>
                                <span class="fa fa-file-text-o form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-2 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
                                </div>
                                <div class="col-xs-2 pull-left">
                                    <a href="{{ $role->id }}" class="btn btn-default btn-block btn-flat">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Permisos asignados</div>

                    <div class="panel-body">
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
                            @foreach($role['permissions'] as $permission)
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
                        @can('can_give_permissions')
                            <div class="pull-left">
                                <a href="/admin/roles/asignar-permiso/{{ $role->id }}" class="btn btn-success"><i class="fa fa-unlock" aria-hidden="true"></i> Asignar nuevo permiso</a>
                            </div>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
