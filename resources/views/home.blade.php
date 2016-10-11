@extends('layouts.app')

@section('htmlheader_title')
    Inicio
@endsection

@section('contentheader_title')
    Inicio
@endsection

@section('contentheader_menu')

@endsection

@section('main-content')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Home</div>

                    <div class="panel-body">
                        @can('see_home')
                            {{ trans('adminlte_lang::message.logged') }}
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
