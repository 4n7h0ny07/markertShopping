@extends('voyager::master')

@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', ($type == 'edit' ? 'Editar' : 'Agregar') . ' Venta')

{{-- @section('page_header')

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
@stop --}}

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
                        <div class="panel panel-info">
                            <div class="panel-heading ">
                                <div class="container">
                                    <br>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Codigo, producto, etc.">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <select class="form-control" name="" id="">
                                                <option value="codigo">Codigo</option>
                                                <option value="producto">producto</option>
                                                <option value="descriptions">Descripcion</option>
                                                <option value="serial">Codigo de Barra</option>
                                                <option value="marca">Marca</option>
                                                <option value="categoria">Categoria</option>
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
                                </div>

                            </div>
                            <div class="panel-body">
                                <br>
                                <div class="col-md-12" style="height: 370px; max-height: 370px; overflow-y: auto">
                                    <div class="row">
                                        @foreach ($productos as $producto)
                                            <div class="card col-md-4 text-info" style="max-width: 250px; height:50mm">
                                                <div class="row g-0">
                                                    <div class="col-md-4">
                                                        <img src="{{ asset('images/no_file.png') }}" width="100px"
                                                            class="img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        
                                                        <div class="card-body">
                                                            <b>id : {{$producto->id}}</b>
                                                            <h5 class="card-title">{{ $producto->categorias->names.' '.$producto->marcas->names.' '.$producto->names }}</h5>
                                                            <span>Bs. <b>{{ $precios->where('products_id', $producto->id)->first()->price_normal ?? ''}}</b></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <p class="card-text"><small class="text-body-secondary"
                                                            style="size: 5pt;">Last
                                                            {{ Carbon\Carbon::parse($producto->created_at)->diffForHumans() }}</small>
                                                    </p>
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
                                    <label>Cliente</label>
                                    <select name="proveedor_id" id="select-proveedor_id" class="form-control select2"
                                        required>
                                        <option disabled selected value="">Seleccionar Cliente </option>
                                        @foreach ($personas as $item)
                                            <option value="{{ $item->id }}">{{ $item->names }} -
                                                {{ $item->dni ?? 'NN' }}</option>
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
                                <div class="form-group col-md-12">
                                    <div class="input-group">
                                        <select name="" id="" class="form-control select2">
                                            <option value="">Seleccionar Plan de Pagos</option>
                                            @foreach ($tipopagos as $planes)
                                                <option value="{{ $planes->id }}">{{ $planes->descripcion }}</option>
                                            @endforeach

                                        </select>
                                        <span class="input-group-btn">
                                            <button class="btn btn-warning" title="Plan de Pagos"
                                                data-target="#modal-create-planpagos" data-toggle="modal"
                                                style="margin: 0px" type="button">
                                                <span class="voyager-window-list" aria-hidden="true"></span>
                                            </button>
                                        </span>
                                    </div>


                                </div>
                                <div class="form-group">
                                    <div class="col-md-6"><input type="text" class="form-control" name="money"
                                            placeholder="0.00"></div>
                                    <div class="col-md-6"><input type="text" class="form-control" name="money"
                                            placeholder="0.00"></div>

                                </div>
                                <br><br>
                                <hr>
                                <div class="form-group">
                                    <h3 class="text-right"><small> Total a Pagar : Bs. </small> <b id="label-total"></b>
                                        0.00 Bs.</h3>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="proforma" value="1"
                                        id="flexCheckChecked">
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Generar solo proforma
                                    </label>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-submit"><i
                                            class="voyager-check"></i> Guardar compra</i></button>
                                            <a href="{{ route('sales.index') }}" class="text-center text-warning">
                                                <span class="glyphicon glyphicon-list"></span>&nbsp;
                                                Volver a la lista
                                            </a>
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
    {{-- Modal crear cliente --}}
    <form action="#" id="form-create-planpagos" method="POST">
        <div class="modal fade" tabindex="-1" id="modal-create-planpagos" role="dialog">
            <div class="modal-dialog modal-warning">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="voyager-window-list"></i> Generar Pal de Pagos</h4>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="type" value="normal">
                        <input type="hidden" name="status" value="activo">
                        <div class="form-group">
                            <label for="full_name">Nombre completo</label>
                            <input type="text" name="full_name" class="form-control" placeholder="Juan Perez"
                                required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="full_name">NIT/CI</label>
                                <input type="text" name="dni" class="form-control" placeholder="123456789">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="full_name">Celular</label>
                                <input type="text" name="phone" class="form-control" placeholder="75199157">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <textarea name="address" class="form-control" rows="3" placeholder="C/ 18 de nov. Nro 123 zona central"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary btn-save-customer" value="Guardar">
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
