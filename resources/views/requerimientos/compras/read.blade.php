@extends('voyager::master')

@section('page_title', 'Ver Compra')

@section('page_header')
    {{-- <h1 class="page-title">
        <i class="voyager-bag"></i> Viendo Requerimiento de | 
        <a href="{{ route('compras.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            Volver a la lista
        </a>
    </h1> --}}
    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-bag"></i> Viendo Requerimiento de | 
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('compras.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Volver a la lista
            </a>
        </div>
    </div>
@stop
@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <img src="" alt="">
                </div>
                <div class="col-md-6">
                    <h3>
                        FORMULARIO DE REQUERIMINTO DE COMPRA INTERNO, MATERIALES, SUMINISTROS Y OTROS
                    </h3>
                </div>
            </div>
        </div>
    </div>
@stop
