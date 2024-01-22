@extends('voyager::master')

@section('page_titlle', 'Viendo POST')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h1 class="page-title">
                    <i class="voyager-basket"></i> Ventas
                </h1>

            </div>
            <form action="{{ Route('sales.create') }}" method="post">
                @csrf
                <div class="col-md-8">
                    <div class="card ">
                        <div class="card-header text-center bg-transparent text-info">
                            <b class="h2">Consola de Ventas</b>
                        </div>
                        <div class="card-body">
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="tipolistaprecios" id="tipolistaprecios">
                                    @foreach ($pricelist as $lista)
                                        <option value="{{ $lista->id }}">{{ $lista->namelists }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <select class="form-control" name="almacen" id="almacen">
                                    @foreach ($almacen as $item)
                                        <option value="{{ $item->id }}">{{ $item->names }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-md-2 form-group">
                                <input name="nit" type="text" class="form-control"
                                    placeholder="Codigo, Nit o Nro carnet">
                            </div>
                            <div class="col-md-4 form-group">
                                <input name="names" type="text" class="form-control" placeholder="Nombre completo">
                            </div>
                            <div class="col-md-3 form-group">
                                <input name="date1" type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                    placeholder="fecha inicio">
                            </div>
                            <div class="col-md-3 form-group">
                                <input name="date2" type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                    placeholder="fecha fin">
                            </div>

                        </div>
                    </div>
                </div>
                <br><br>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">Crear
                            Venta</button>
                        <input type="text" name="code" class="form-control" id="q" placeholder="Buscar....">
                        <input name="buscar" type="submit" class="btn btn-warning btn-block" value="Buscar"
                            placeholder="buscar">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
