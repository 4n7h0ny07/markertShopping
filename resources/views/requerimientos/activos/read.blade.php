@extends('voyager::master')

@section('page_title', 'Ver Compra')

@section('page_header')
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.notepad{
    width: 80%;
    margin: auto;
    margin-top: 10em;
    max-width: 500px;
    box-shadow: 10px 10px 40px rgba(0,0,0,0.20);
    border-radius: 0 0 10px 10px;
}

.header{
    width: 100%;
    height: 50px;
    background: #333;
       border-radius: 5px 5px 0 0;
}

.paper{
    /*width: 100%;
    height: 100%;*/
    min-height: 45vh;
    background: repeating-linear-gradient(#ffffff, #ffffff 31px, #94ACD4 31px, #94ACD4 32px);
    
    font-family: cursive;
    font-size: 22px;
    /*line-height: 34px;
    outline: 0;*/
    /*padding: 35px 50px;*/
}
</style>
    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-laptop"></i> Viendo Activos
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('activos.print', ['id' => $act->id]) }}" target="_blank" class="btn btn-dark">
                <span class="glyphicon glyphicon-print"></span>&nbsp;
                Imprimir PDF
            </a>
            <a href="{{ route('activos.index') }}" class="btn btn-warning">
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
                <div class="card">
                    <div class="card-body">
                        {{-- <h5 class="card-title">Special title treatment</h5>
                      <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a> --}}

                        <div class="col-md-12">
                            <div class="col-md-4">
                                <img src="{{ asset('images/moxos.png') }}" alt="NO IMAGES" style="width:75%">
                            </div>
                            <div class="col-md-8 text-center">
                                <h2 style="color: rgba(10, 10, 105, 0.856)">
                                    FORMULARIO DE SOLICITUD DE ALTA <br> <small style="color: rgba(10, 10, 105, 0.856)">DE
                                        ACTIVO FIJO</small>
                                </h2>
                                <b style="color: rgb(250, 3, 3); font-size:16pt; font-weight:bold">N°
                                    {{ $act->number }}/@php echo date('Y')@endphp</b>

                            </div>
                            <div class="col-md-12">
                                <div class="col-md-7">
                                    <p>Area:</p>
                                </div>
                                <div class="col-md-5">
                                    <p>Fecha: {{ date('d F Y H:i', strtotime($act->created_at)) }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <p>Solicitante: <b>{{ $act->empleado->name }}</b></p>
                                </div>
                                <div class="col-md-12 paper"
                                    style="height: 50mm; border-color: rgb(0, 0, 105);border-width: 1em;">
                                    <h3 class="text-center text-ligth"
                                        style="background-color: rgb(0, 0, 105); font-weight:bold">
                                        DESCRIPCION COMPLETA DEL ACTIVO</h3>
                                    <p>{{ $act->descriptions }}</p>
                                </div>
                                <hr>
                                <div class="col-md-4">
                                    <p style="font-size: 12pt;"><b>Fecha de Compra: </b> {{ date('d F Y H:i', strtotime($act->created_at)) }}</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="font-size: 12pt;"><b>Vida util del Activo: </b> {{ $act->vida_util }} Años</p>
                                </div>
                                <div class="col-md-4">
                                    <p style="font-size: 12pt;"><b>Estado del Activo: </b> @switch($act->status_at)
                                            @case(0)
                                                <span style="height: 50mm; border-color: rgb(172, 3, 3);">BAJA</span>
                                            @break

                                            @case(1)
                                                <span style="height: 50mm; border-color: rgb(0, 109, 5);">ALTA</span>
                                            @break

                                            @default
                                        @endswitch
                                    </p>
                                </div>
                                <hr>
                                <div class="col-md-6">
                                    <p style="font-size: 12pt;"><strong>Responsable : </strong>{{$act->persona->names}}</p>
                                </div>
                                <div class="col-md-3">
                                    <p style="font-size: 12pt;"><strong>Costo del activo: </strong>{{$act->costo}}</p>
                                </div>
                                <div class="col-md-3">
                                    <p style="font-size: 12pt;"><strong>Valor de Rescate: </strong>{{$act->valor_residual}}</p>
                                </div>
                                <div class="col-md-7">
                                    <p style="font-size: 14pt; text-align:center;">Datos Necesarios</p>
                                    <p style="font-size: 14pt;"><strong>Marca </strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$act->marca}}</p>
                                    <p style="font-size: 14pt;"><strong>Modelos </strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$act->modelo}}</p>
                                    <p style="font-size: 14pt;"><strong>Nombre del Activo</strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;{{$act->name}}</p>
                                    <p style="font-size: 14pt;"><strong>Numero Serie </strong>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp;{{$act->serialNumber}}</p>


                                </div>
                                <div class="col-md-5" style="height: 75mm !important; /*border: ridge; border-radius:1em; border-color: rgba(10, 10, 105, 0.856);*/">
                                    <p style="font-size: 14pt; text-align:center;">Foto/Iamgen</p>
                                    
                                </div>
                                <div class="col-md-12" style="height: 30mm !important; /*border: ridge; border-radius:1em; border-color: rgba(10, 10, 105, 0.856);*/">
                                    <p>Opservacion:</p>
                                    <p>{{ $act->observaciones }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
@stop
