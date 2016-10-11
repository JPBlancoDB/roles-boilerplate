@extends('layouts.app')

@section('htmlheader_title')
    Roles
@endsection

@section('contentheader_title')
    Roles
@endsection

@section('contentheader_menu')
    <a href="roles/crear" class="btn btn-primary">Nuevo rol</a>
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Roles</div>

                    <div class="panel-body">
                        @can('see_roles_table')
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripci&oacute;n</th>
                                    <th>Fecha alta</th>
                                    <th>Permisos</th>
                                    <th>Editar</th>
                                    <th>Eliminar</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->description }}</td>
                                        <td>{{ $role->created_at }}</td>
                                        <td><a href="roles/permisos-asignados/{{ $role->id }}" class="btn btn-success"><i class="fa fa-unlock" aria-hidden="true"></i></a></td>
                                        <td><a href="roles/editar/{{ $role->id }}" class="btn btn-primary"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
                                        <td>
                                            <form method="POST" action="roles/eliminar/{{ $role->id }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </form>
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
