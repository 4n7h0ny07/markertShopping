{{-- Single Baja modal --}}


<div class="modal modal-warning fade" tabindex="-1" id="modal_baja" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Desea dar de baja el Activo?</h4>
            </div>
            <form action="#" id="death_form" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <textarea class="form-control" name="detalleBaja" cols="30" rows="5"
                        placeholder="Escriba el motivo de la baja del Activo"></textarea>
                </div>
                <div class="modal-footer">
                    {{-- {{ method_field('DELETE') }}
                    {{ csrf_field() }} --}}
                    <input type="submit" class="btn btn-warning pull-right delete-confirm" value="Sí, dae de baja">

                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Single delete modal --}}
<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="voyager-trash"></i> Desea eliminar el siguiente registro?</h4>
            </div>
            <div class="modal-footer">
                <form action="#" id="delete_form" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                </form>
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
