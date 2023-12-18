@extends('layouts.impresion.master')
{{-- @extends('layouts.impresion.master', ['title' => 'Recibo venta Nº '.str_pad($venta->id, 5, "0", STR_PAD_LEFT)]) --}}

@section('content')

    {{-- @php
        $months = ['', 'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    @endphp --}}
    <br>
    <div class="content">
        <table width="100%">
            <tr>
                <td width="150px"><b>Cliente</b></td>
                <td width="50px">:</td>
                <td>{{ $venta->cliente->nombre_completo }}</td>
                <td width="150px"><b>N&deg; de Celular</b></td>
                <td width="50px">:</td>
                <td>{{ $venta->cliente->telefono }}</td>
            </tr>
            <tr>
                <td width="150px"><b>Garante(s)</b></td>
                <td width="50px">:</td>
                <td>
                    @foreach ($venta->garantes as $item)
                        {{ $item->persona->nombre_completo }} &nbsp;
                    @endforeach
                </td>
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width="150px"><b>Observaciones</b></td>
                <td width="50px">:</td>
                <td colspan="4">{{ $item->observaciones ?? 'Sin observaciones' }}</td>
            </tr>
        </table>
        <br>
        <table width="100%" cellspacing="0" cellpadding="5" border="1">
            <thead>
                <tr>
                    <th>N&deg;</th>
                    <th>Producto</th>
                    <th style="text-align: right">Precio</th>
                    <th style="text-align: right">Descuento</th>
                    <th style="text-align: right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->detalles as $item)
                    @php
                        $cont = 1;
                        $total = 0;
                        $pagos = 0;
                        $descuento = 0;
                    @endphp
                    <tr>
                        <td>{{ $cont }}</td>
                        <td>
                            @php
                                $img = asset('images/default.jpg');
                                $imagenes = [];
                                if ($item->producto->tipo->imagenes) {
                                    $imagenes = json_decode($item->producto->tipo->imagenes);
                                    $img = url('storage/'.str_replace('.', '-cropped.', $imagenes[0]));
                                }
    
                                foreach ($item->cuotas as $cuota) {
                                    foreach ($cuota->pagos as $pago) {
                                        if(!$pago->deleted_at){
                                            $pagos += $pago->monto;
                                        }
                                    }
    
                                    $descuento += $cuota->descuento;
                                }
    
                                $total += $item->precio - $descuento;
                            @endphp
                            <table border="0">
                                <tr>
                                    <td><img src="{{ $img }}" alt="#" width="35px" style="margin-right: 5px" /></td>
                                    <td>
                                        <b>{{ $item->producto->tipo->marca->nombre }} {{ $item->producto->tipo->nombre }}</b><br>
                                        <small>Código/N&deg; {{ $item->producto->codigo }}</small>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="text-align: right">{{ $item->precio }}</td>
                        <td style="text-align: right">{{ $descuento }}</td>
                        <td style="text-align: right">{{ number_format($item->precio - $descuento, 2, ',', '.') }}</td>
                    </tr>
                    @php
                        $lineas = setting('ventas.recibo_pago') == 'carta' ? 15 : 5;
                    @endphp
                    @for ($i = $cont; $i < $lineas; $i++)
                    <tr>
                        <td style="height: 30px">{{ $i +1 }}</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    @endfor
                    @php
                        $cont++;
                    @endphp
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        <table border="0">
                            <tr>
                                <td>
                                    @php
                                    $string_qr = 'Recibo de venta | '.setting('site.title').', fecha '.date('d', strtotime($pago->created_at)).' de '.$months[intval(date('m', strtotime($pago->created_at)))].' de '.date('Y', strtotime($pago->created_at)).', cliente '.$venta->cliente->nombre_completo;
                                        $qrcode = base64_encode(QrCode::format('svg')->size(70)->errorCorrection('H')->generate($string_qr));
                                    @endphp
                                    <img src="data:image/png;base64, {!! $qrcode !!}"> <br>
                                </td>
                                <td>
                                    <p>
                                        @php
                                            $formatter = new \Luecano\NumeroALetras\NumeroALetras();
                                        @endphp
                                        SON: <b>{{ $formatter->toInvoice($total, 2, 'BOLIVIANOS') }}</b> <br>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td>TOTAL</td>
                    <td style="text-align: right; background-color: rgb(209, 209, 209)"><b>{{ number_format($total, 2, ',', '.') }}</b></td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection

@section('css')
    <style>
        table, th, td {
            border-collapse: collapse;
            font-size: 12px
        }
        th{
            font-size: 10px !important
        }
    </style>
@endsection