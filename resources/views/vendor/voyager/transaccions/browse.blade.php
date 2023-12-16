@extends('voyager::master')

@section('page_title', 'Viendo : Transacciones')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="page-title">
                    <i class="voyager-credit-card"></i> Transacciones
                </h1>
                <a href="#" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>Crear</span>
                </a>
                  
            </div>
            <div class="col-md-8 text-right" style="padding-top: 10px">

            </div>
        </div>
    </div>
@stop
@section('content')

<h1>aqui van las transacciones</h1>
 <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">

                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    
@stop