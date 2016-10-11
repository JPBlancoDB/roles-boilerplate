@extends('layouts.app')

@section('htmlheader_title')
    Listado de Permisos
@endsection

@section('contentheader_title')
    Listado de Permisos
@endsection

@section('contentheader_menu')
    <a href="permisos/crear" class="btn btn-primary">Nuevo permiso</a>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Permisos</div>

                    <div class="panel-body">
                        @can('see_permissions_table')
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Fecha alta</th>
                                    <th>Asignar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>{{ $permission->created_at }}</td>
                                        <td>
                                            @if($role->permissions->contains($permission->id))
                                                <i class="fa fa-check" aria-hidden="true"></i> Otorgado
                                            @else
                                                <form action="/admin/roles/asignar-permiso/{{ $role->id }}/{{ $permission->id }}" method="post">
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                </form>
                                            @endif
                                        </td>
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
