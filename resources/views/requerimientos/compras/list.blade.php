<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Monto</th>
                    <th>Detalles</th>
                    <th>Total Bs.</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item->number }}</td>
                        <td>{{ $item->persona_id }}</td>
                        <td>
                    <tr>
                        <td>
                        <td>{{ $item->adelanto }}</td>
                        </td>
                        <td>
                        <td>{{ $item->monto }}</td>
                        </td>
                        <td>
                        <td>{{ $item->saldo }}</td>
                        </td>
                    </tr>
                    </td>
                    <td>{{ $item->descriptions }}</td>
                    <td>{{ $item->saldo }}</td>
                    <td>{{ $item->user_id }}</td>
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
