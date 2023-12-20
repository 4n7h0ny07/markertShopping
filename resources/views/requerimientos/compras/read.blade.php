@extends('voyager::master')

@section('page_title', 'Ver Compra')

@section('page_header')

    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-bag"></i> Viendo Requerimiento de | {{ $reg->tipo_requerimiento }}
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('compras.print',['id' => $reg->id]) }}" class="btn btn-dark">
                <span class="glyphicon glyphicon-print"></span>&nbsp;
                Imprimir PDF
            </a>
            <a href="{{ route('compras.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Volver a la lista
            </a>
        </div>
    </div>
@stop
@section('content')
    <div class="page-content read container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <img src="{{ asset('images/moxos.png') }}" alt="NO IMAGE" style="width:75%">
                    </div>
                    <div class="col-md-8 text-center">
                        <h2 style="color: rgba(10, 10, 105, 0.856)">
                            FORMULARIO DE REQUERIMIENTO INTERNO <br> <small
                                style="color: rgba(10, 10, 105, 0.856)">MATERIALES, SUMINISTROS Y OTROS</small>
                        </h2>
                 
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault" style="color:rgba(10, 10, 105, 0.856); font-size:16pt; font-weight:bold">
                                    {{ $reg->tipo_requerimiento }}</label>
                            </div>
                            <b style="color: rgb(250, 3, 3); font-size:16pt; font-weight:bold">N° {{ $reg->number}}/@php echo date('Y')@endphp</b>
                      
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-7">
                            <p>Area:</p>
                        </div>
                        <div class="col-md-5">
                            <p>Fecha: {{ $reg->created_at}}</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <p>Solicitante: <b>{{ $reg->empleado->name }}</b></p>
                        </div>
                        <div class="col-md-12" style="height: 50mm; border-color: rgb(0, 0, 105);border-width: 1em;">
                            <h3 class="text-center text-ligth" style="background-color: rgb(0, 0, 105); font-weight:bold">DESCRIPCION DEL PRODUCTO, CANTIDAD Y PRECIO</h3>
                            <p>{{ $reg->descriptions }}</p>
                        </div>
                        <div class="col-md-7">
                            <p>Documento Adjunto</p>
                            {{ $reg->documento }}
                        </div>
                        <div class="col-md-5">
                            <p>Proveedor</p>
                            <p class="text-left"><b>{{ $reg->persona->names }}</b></p>
                            <p>Anticipo al Proveedor: Si No Monto $us/Bs <b style="text-align: rigth">{{ number_format($reg->adelanto,2) }}</b></p>
                            <p>Total a Pagar $us/Bs.: <b style="text-align: right">{{ number_format($reg->monto,2) }}</b></p>
                        </div>
                        <div class="col-md-12">
                            <p>Opservacion:</p>
                            <p>{{ $reg->observaciones }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@stop
