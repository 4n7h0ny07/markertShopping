@extends('voyager::master')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', ($type == 'edit' ? 'Editar' : 'Agregar') . ' plan de pagos')

@section('page_header')

    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-window-list"></i>
                {{ ($type == 'edit' ? 'Editar' : 'Agregar') . ' Plan de pagos' }}
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('plan.index') }}" class="btn btn-warning">
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
                        action="{{ $type == 'edit' ? route('plan.update', ['compra' => $reg->id]) : route('plan.store') }}"
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
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Plan de Pagos</label>
                                                <input type="text" class="form-control" name="descripcion" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">N° de Cuotas</label>
                                                <input type="text" class="form-control" name="cuotas" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Primer Vencimiento</label>
                                                <input type="text" class="form-control" name="vencimiento" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Dias entre las Cuotas</label>
                                                <input type="text" class="form-control" name="dias" placeholder="" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Observaciones.</label>
                                                <textarea name="observaciones" class="form-control" rows="3" placeholder="Observaciones">{{ isset($reg) ? $reg->observaciones : old('observaciones') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="padding-left: 0px">
                                        
                                        {{-- <div class="form-group">
                                            <h3 class="text-right" id="label-total">0.00 Bs.</h3>
                                        </div> --}}
                                        {{-- <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="proforma" value="1" id="flexCheckChecked">
                                            <label class="form-check-label" for="flexCheckChecked">
                                              Generar solo proforma
                                            </label>
                                        </div> --}}

                                    </div>
                                </div>

                        </div>
                        <hr>
                        <div class="panel-footer">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm btn-submit"><i
                                        class="voyager-check"></i> Guardar</i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
