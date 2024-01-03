@extends('voyager::master')

@section('page_titlle', 'Viendo Importar')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <h1 class="page-title">
                    <i class="voyager-forward"></i> Importar
                </h1>
            </div>
            {{-- <div class="col-md-7 text-right" style="margin-top: 40px">
                <p>Puedes descargar el archivo  Excel </p>
            </div> --}}
            <div class="col-md-10 text-right" style="margin-top: 40px">
                <a type="button" class="btn btn-warning" href="{{ asset('files/plantillaProductos.xlsx') }}" rel="noopener noreferrer"> <i class="voyager-cloud-download"></i> Descargar Plantilla Excel</a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="type">Tipo</label>
                                    <select name="type" class="form-control select2" required>
                                        <option value="">Seleccione tipo de datos</option>
                                        <option value="products">Productos</option>
                                        <option value="marcas">Marcas</option>
                                        <option value="categorias">Categorias</option>
                                        {{-- <option value="products">Productos</option>
                                        <option value="products">Productos</option> --}}

                                        

                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="file">Archivo</label>
                                    <input type="file" name="file">
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button type="submit" class="btn btn-primary">Importar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop