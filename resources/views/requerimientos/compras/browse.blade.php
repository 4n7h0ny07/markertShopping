@extends('voyager::master')

@section('page_title', 'Viendo Requerimientos | Compras')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="page-title">
                    <i class="voyager-bag"></i> Requerimientos | Compras
                </h1>
            </div>
            <div class="col-md-8 text-right" style="margin-top: 30px">
                <a href="{{ route('compras.create') }}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Crear</span>
                </a>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="dataTable_length">
                                            <label>Mostrar <select id="select-paginate" class="form-control input-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> registros</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="dataTable_filter" class="dataTables_filter">
                                            <label>Buscar:<input type="search" id="input-search" class="form-control input-sm" placeholder="" aria-controls="dataTable"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right" style="margin-bottom: 0px; margin-top: -20px">
                                        <a href="#more-options" class="btn btn-link" data-toggle="collapse" style="padding: 10px 0px"> <i class="fa fa-plus"></i> Más opciones</a>
                                    </div>
                                </div>
                                <div class="row" id="div-results" style="min-height: 120px"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
@section('css')

@stop

@section('javascript')
    <script>
        var countPage = 10, order = 'id', typeOrder = 'desc';

        $(document).ready(() => {
            list();
            
            $('#input-search').on('keyup', function(e){
                list();
            });
            $('#select-paginate').change(function(){
                countPage = $(this).val();
                list();
            });
        });
        function list(page = 1){
            // $('#div-results').loading({message: 'Cargando...'});
            let url = '{{ url("admin/compras/list/ajax") }}';
            let search = $('#input-search').val() ? $('#input-search').val() : '';
            $.ajax({
                url: `${url}/${search}?paginate=${countPage}&page=${page}`,
                type: 'get',
                success: function(response){
                    $('#div-results').html(response);
                    // $('#div-results').loading('toggle');
                }
            });
        }
    </script>
@stop