@extends('voyager::master')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', ($type == 'edit' ? 'Editar' : 'Agregar') . ' Venta')

@section('page_header')

    <div class="row">
        <div class="col-md-4">
            <h1 class="page-title">
                <i class="voyager-basket"></i>
                {{ ($type == 'edit' ? 'Editar' : 'Agregar') . ' Venta' }}
            </h1>
        </div>
        <div class="col-md-8 text-right" style="margin-top: 30px">
            <a href="{{ route('sales.index') }}" class="btn btn-warning">
                <span class="glyphicon glyphicon-list"></span>&nbsp;
                Volver a la lista
            </a>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <form class="form-submit" role="form"
            action="{{ $type == 'edit' ? route('sales.update', ['compra' => $reg->id]) : route('sales.store') }}"
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
                        <div class="panel panel-bordered">
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Codigo, producto, etc.">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Codigo</option>
                                            <option value="">producto</option>
                                            <option value="">Descripcion</option>
                                            <option value="">Codigo de Barra</option>
                                            <option value="">Codigo SK</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="" id="">
                                            <option value="">Todos</option>
                                            <option value="">Con Existencia</option>
                                            <option value="">Sin Existencia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="height: 370px; max-height: 370px; overflow-y: auto">
                                    <div class="row">
                                        @foreach ($productos as $producto)
                                            <div class="card col-md-3" style="max-width: 250px; height:50mm">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="..." class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">{{ $producto->names }}</h5>
                                                            <p class="card-text"><small class="text-body-secondary">Last
                                                                    updated 3 mins ago</small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="panel panel-bordered">
                            <div class="panel-body">
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
                                <div class="form-group">
                                    <h3 class="text-right" id="label-total">0.00 Bs.</h3>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="proforma" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Generar solo proforma
                                    </label>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block btn-submit"><i
                                            class="voyager-check"></i> Guardar compra</i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="col-md-12" style="height: 370px; max-height: 370px; overflow-y: auto">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">N&deg;</th>
                                                <th>Detalles</th>
                                                <th style="min-width: 100px">Precio</th>
                                                <th style="min-width: 100px">Cantidad</th>
                                                <th style="min-width: 100px" class="text-right">Subtotal</th>
                                                <th style="width: 50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body">
                                            <tr id="tr-empty">
                                                <td colspan="6" style="height: 290px">
                                                    <h4 class="text-center text-muted" style="margin-top: 50px">
                                                        <i class="glyphicon glyphicon-shopping-cart"
                                                            style="font-size: 50px"></i> <br><br>
                                                        Lista de venta vacía
                                                    </h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
        </form>
    </div>
@stop
