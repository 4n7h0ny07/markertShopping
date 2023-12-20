@extends('layouts.printer.master')

@section('content')
    <div class="content">
        <table width="100%">
            <td width="65%">
                <div class="col-md-7" style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">
                    <p > Solicitante: <b style="color: black important;">{{ $printer->empleado->name }}</b></p>
                </div>
            </td>
            <td width="35%">
                <div class="col-md-5" style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">
                    <p>Fecha Solicitud:  <b style="color: black important;"> @php echo date('d F Y', strtotime($printer->created_at)); @endphp </b></p>
                </div>
            </td>
            {{-- <th colspan="2" style="border-color: rgba(10, 10, 105, 0.856)">
                <div class="col-md-12" >
                    <h3 class="text-center text-ligth" style="color:rgb(255, 255, 255); font-weight:bold">
                        DESCRIPCION DEL PRODUCTO, CANTIDAD Y PRECIO</h3>
                    {{-- <p>{{ $reg->descriptions }}</p>
                </div>
            </th> --}}
        </table>
        <table width="100%" style="border: 1em" border="1">
            <thead>
                <th colspan="2" style="background-color: rgba(10, 10, 105, 0.856); color:white; border-radius: 1em;"
                    align="center">
                    DESCRIPCION DEL PRODUCTO, CANTIDAD Y PRECIO
                </th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" heigth="90mm" style="border: 2px">
                        <div style="height: 190;font-size:11pt; text-align:justify">
                            {{ $printer->descriptions }}
                        </div>

                    </td>
                </tr>
                <tr>
                    <td width="35%">
                        <div style="width: 100%">
                            <p style="color: rgba(10, 10, 105, 0.856); font-size:10pt "><b class="text-center">Documento Adjunto: </b></p>
                            @switch($printer->documento)
                                @case('Factura')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Factura
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Proforma
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de venta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Otros
                                        </label>
                                    </div>
                                @break

                                @case('Proforma')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Factura
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Proforma
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de venta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Otros
                                        </label>
                                    </div>
                                @break

                                @case('Nota de Venta')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Factura
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Proforma
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de venta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Otros
                                        </label>
                                    </div>
                                @break

                                @case('Otros')
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Factura
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Proforma
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de venta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                            id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault"
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Otros
                                        </label>
                                    </div>
                                @break
                            @endswitch
                        </div>

                    </td>
                    <td width="65%">
                        <div style="width: 100%">
                            <p style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right">Proveedor: </b></p>

                           <span><b> {{ $printer->persona->names }}</b></span><br>
                           <span style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right">Anticipo al Proveedor Monto $us/Bs.: </b></span>
                           <span style="font-size:11pt; "><b class="text-left" style="text-align: left !important;">@php  echo number_format($printer->anticipo,2);@endphp</b></span><br>
                           <span style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right" style="text-align: left !important;">Total a Pagar $us/Bs.: </b></span>
                           <span style="font-size:11pt; "><b class="text-left">@php  echo number_format($printer->monto,2);@endphp</b></span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" width="100%" border="1">
                        <div>
                            <p style="color: rgba(10, 10, 105, 0.856); font-size:10pt "><b class="text-right">Proveedor: </b></p>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
@endsection
