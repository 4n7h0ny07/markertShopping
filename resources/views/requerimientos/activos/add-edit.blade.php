@extends('voyager::master')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', ($type == 'edit' ? 'Editar' : 'Agregar') . ' Activos')

@section('page_header')

    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-laptop"></i>
                {{ ($type == 'edit' ? 'Editar' : 'Agregar') . ' Activos' }}
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('activos.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Volver a la lista
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <form class="form-submit" role="form"
                        action="{{ $type == 'edit' ? route('activos.update', ['compra' => $reg->id]) : route('activos.store') }}"
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Cuentas:</label>
                                                <select name="cuentas" id="cuentas" class="form-control select2">
                                                    <option disabled selected value="">Seleccionar Cuenta </option>
                                                    @foreach ($cuentas as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }} -
                                                            {{ $item->code ?? 'NN' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nombre del Activo</label>
                                                <input type="text" name="name_activo" id="name_activo"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marca</label>
                                                <input type="text" name="marca" id="marca" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>modelo</label>
                                                <input type="text" name="modelo" id="modelo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Numero de Serie/Imei</label>
                                                <input type="text" name="serialnumber" id="serialnumber"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Costo</label>
                                                <input type="text" name="costo" id="costo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Valor Residual</label>
                                                <input type="text" name="vresidual" id="vresidual" class="form-control"  value="1" readonly="readonly" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Vida Util</label>
                                                <input type="text" name="vutil" id="vutil" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="descripcion" id="descripcion" class="form-control richTextBox" rows="6" cols="10"
                                            placeholder="Descripcion completa del activo....">{{ isset($reg) ? $reg->requerimiento : old('requerimiento') }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-3" style="padding-left: 0px">
                                    <div class="form-group">
                                        <label>Personal a Activar</label>
                                        <select name="personal" id="select-personal_id" class="form-control select2"
                                            required>
                                            <option disabled selected value="">Seleccionar Personal </option>
                                            @foreach ($personas as $item)
                                                <option value="{{ $item->id }}">{{ $item->names }} -
                                                    {{ $item->nit ?? 'NN' }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('personal_id'))
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
                                                class="voyager-check"></i> Guardar</i></button>
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
