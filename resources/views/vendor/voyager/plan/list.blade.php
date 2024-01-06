<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataTable" class="table table-hover dataTable no-footer">
            <thead>
                <tr>
                    <th>Plan de Pagos</th>
                    <th>Detalles del Plan de Pagos</th>
                    <th>Descripcion del plan de Pagos</th>
                    <th>Registrado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($planes as $item)
                    <tr>
                        <td>{{ $item->descripcion }}</td>
                        <td>
                            <table>
                                <tr>
                                    <th>Nro Cuotas</th>
                                    <th>Dia 1er Vencimiento</th>
                                    <th>Dias entre Cuotas</th>
                                </tr>  
                                <tr>
                                    <td>{{ $item->nro_cuotas }}</td>
                                    <td>{{ $item->primer_vencimiento }}</td>
                                    <td>{{ $item->dias_entre_cuotas }}</td>
                                </tr>  
                            </table>
                        </td>
                        <td>{{ $item->observaciones }}</td>
                        <td> {{ date('d/m/Y H:i', strtotime($item->created_at)) }} <br>
                            <small>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</small>
                        </td>
                        <td class="no-sort no-click bread-actions text-right">
                            <a href="{{ route('voyager.plan', $item->id) }}" title="Ver"
                                class="btn btn-sm btn-info view">
                                <i class="voyager-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                            </a>
                            {{-- <a href="{{ route('voyager.requerimientos.activos.edit', $item->id) }}" title="Editar"   target="_blank" class="btn btn-sm btn-primary edit">
                                <i class="voyager-edit"></i> <span class="hidden-xs hidden-sm">Editar</span>
                              
                            </a> --}}   
                            {{-- <button title="Borrar" class="btn btn-sm btn-danger " data-toggle="modal" data-target="#delete_modal" onclick="deleteItem('{{url('requerimientos/activos'.$item->id)}}')"> 
                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Borrar</span>
                            </button>                      --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="7">
                            <div class="alert alert-warning"  role="alert">
                                <strong><h3><i class="voyager-info-circled"></i><br>No as registrado ningun Plan de Pagos</h3></strong>
                            </div>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-4" style="overflow-x:auto">
        @if (count($activos) > 0)
            <p class="text-muted">Mostrando del {{ $activos->firstItem() }} al {{ $activos->lastItem() }} de
                {{ $activos->total() }} registros.</p>
        @endif
    </div>
    <div class="col-md-8" style="overflow-x:auto">
        <nav class="text-right">
            {{ $activos->links() }}
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
