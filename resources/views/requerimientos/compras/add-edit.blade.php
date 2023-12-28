@extends('voyager::master')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', ($type == 'edit' ? 'Editar' : 'Agregar') . ' Compras')

@section('page_header')
    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-bag"></i>
                {{ ($type == 'edit' ? 'Editar' : 'Agregar') . ' Compras' }}
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('activos.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Volver a la lista
            </a>
        </div>
    </div>
    {{-- <h1 class="page-title">
        <i class="voyager-receipt"></i>
        {{ ($type == 'edit' ? 'Editar' : 'Agregar') . ' Compras' }}
    </h1> --}}
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <form class="form-submit" role="form"
                        action="{{ $type == 'edit' ? route('compras.update', ['compra' => $reg->id]) : route('compras.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @if ($type == 'edit')
                            {{ method_field('PUT') }}
                        @endif

                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (session('error_detalle'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ session('error_detalle') }}</li>
                                    </ul>
                                </div>
                            @endif

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Tipo Requerimiento</label>
                                                <select name="tipo" id="tipo" class="form-control select2">
                                                    <option disabled selected value="">Seleccionar tipo de
                                                        requerimiento
                                                    </option>
                                                    <option value="Compra">Compra</option>
                                                    <option value="Pago">Pago</option>
                                                    <option value="Fondo en Avance">Fondo en Avance</option>
                                                    <option value="Consumo">Consumo</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Documento Adjunto</label>
                                                <select name="documento" id="documento" class="form-control select2">
                                                    <option disabled selected value="">Seleccionar Documento </option>
                                                    <option value="Factura">Factura</option>
                                                    <option value="Proforma">Proforma</option>
                                                    <option value="Nota de Venta">Nota de Venta</option>
                                                    <option value="Otros">Otros</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Anticipo</label>
                                                <input type="text" name="anticipo" id="anticipo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Total a Pagar</label>
                                                <input type="text" name="tpagar" id="tpagar" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="requerimiento" id="requerimiento" class="form-control richTextBox" rows="6" cols="10"
                                            placeholder="Requerimiento......">{{ isset($reg) ? $reg->requerimiento : old('requerimiento') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-3" style="padding-left: 0px">
                                    <div class="form-group">
                                        <label>Proveedor</label>
                                        <select name="proveedor_id" id="select-proveedor_id" class="form-control select2"
                                            required>
                                            <option disabled selected value="">Seleccionar proveedor </option>
                                            @foreach ($personas as $item)
                                                <option value="{{ $item->id }}">{{ $item->names }} -
                                                    {{ $item->nit ?? 'NN' }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('proveedor_id'))
                                            @foreach ($errors->get('persona_id') as $error)
                                                <span class="help-block text-danger">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <textarea name="observaciones" class="form-control" rows="3" placeholder="Observaciones">{{ isset($reg) ? $reg->observaciones : old('observaciones') }}</textarea>
                                    </div>
                                    {{-- <div class="form-group">
                                        <h3 class="text-right" id="label-total">0.00 Bs.</h3>
                                    </div> --}}
                                    {{-- <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="proforma" value="1" id="flexCheckChecked">
                                        <label class="form-check-label" for="flexCheckChecked">
                                          Generar solo proforma
                                        </label>
                                    </div> --}}
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block btn-submit"><i
                                                class="voyager-check"></i> Guardar compra</i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
