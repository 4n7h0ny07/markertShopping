<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover dataTable no-footer">
            <thead>
                <tr>
                    <th>Numero</th>
                    <th>Proveedor</th>
                    <th>Detalles Costo</th>
                    <th>Descripcion</th>
                    <th>Solicitado por</th>
                    <th>Registro.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->names }}</td>
                        <td>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Adelanto</th>
                                        <th>T/Pagar</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{ $item->adelanto }}</td>
                                    <td>{{ $item->monto }}</td>
                                    <td>{{ $item->saldo }}</td>        
                                </tr>
                                </tbody>
                                
                            </table>                            
                        </td>
                     

                    <td>{{ $item->descriptions }}</td>
                    <td>{{ $item->name }}</td>
                    <td>  {{ date('d/m/Y H:i', strtotime($item->created_at)) }} <br>
                        <small>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small></td>
                        <td class="no-sort no-click bread-actions text-right">
                            <a href="{{ route('voyager.requerimientos.compras', $item->id) }}" title="Ver" class="btn btn-sm btn-warning view">
                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                            </a>
                            {{-- <a href="{{ route('voyager.requerimientos.compras.edit', $item->id) }}" title="Editar" class="btn btn-sm btn-primary edit">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                            </a> --}}
                            {{-- <button title="Borrar" class="btn btn-sm btn-danger delete" data-toggle="modal" data-target="#delete_modal" onclick="deleteItem('{{ url('admin/personas/'.$item->id) }}')">
                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                            </button>                        --}}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td class="text-center" colspan="6">No hay resultados</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-4" style="overflow-x:auto">
        @if(count($data)>0)
            <p class="text-muted">Mostrando del {{$data->firstItem()}} al {{$data->lastItem()}} de {{$data->total()}} registros.</p>
        @endif
    </div>
    <div class="col-md-8" style="overflow-x:auto">
        <nav class="text-right">
            {{ $data->links() }}
        </nav>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.page-link').click(function(e) {
            e.preventDefault();
            let link = $(this).attr('href');
            if (link) {
                page = link.split('=')[1];
                list(page);
            }
        });
    });
</script>
