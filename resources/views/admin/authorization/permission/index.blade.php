@extends('layouts.app')

@section('htmlheader_title')
    Permisos
@endsection

@section('contentheader_title')
    Permisos
@endsection

@section('contentheader_menu')
    @can('can_create_permissions')
        <a href="permisos/crear" class="btn btn-primary">Nuevo permiso</a>
    @endcan
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->description }}</td>
                                        <td>{{ $permission->created_at }}</td>
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
