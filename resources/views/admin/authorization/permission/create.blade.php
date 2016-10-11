@extends('layouts.app')

@section('htmlheader_title')
    Nuevo permiso
@endsection

@section('contentheader_title')
    Nuevo permiso
@endsection

@section('contentheader_menu')
    <a href="/admin/permisos" class="btn btn-primary">Volver listado de permisos</a>
@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Ingrese datos</div>

                    <div class="panel-body">
                        <form action="crear" method="post">
                            {{ csrf_field() }}
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nombre del permiso" name="name" />
                                <span class="fa fa-tag form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Descripci&oacute;n del permiso" name="description" />
                                <span class="fa fa-file-text-o form-control-feedback"></span>
                            </div>
                            <div class="row">
                                <div class="col-xs-2 pull-right">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Aceptar</button>
                                </div>
                                <div class="col-xs-2 pull-left">
                                    <a href="crear" class="btn btn-default btn-block btn-flat">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection