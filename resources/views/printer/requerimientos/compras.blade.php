@extends('layouts.printer.master')

@section('content')
    <div class="content">
        <table width="100%">
            <tr>
                <td width="65%">
                    <div class="col-md-7" style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">
                        <span> Solicitante: <b style="color: black important;">{{ $printer->empleado->name }}</b></span>
                    </div>
                </td>
                <td width="35%">
                    <div class="col-md-5" style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">
                        <span>Fecha Solicitud: <b style="color: black important;"> @php echo date('d F Y', strtotime($printer->created_at)); @endphp </b></span>
                    </div>
                </td>
            </tr>
        </table>
        <table width="100%">
            <thead >
                <th colspan="2" class="thead-pdf">
                    DESCRIPCION DEL PRODUCTO, CANTIDAD Y PRECIO
                </th>
            </thead>
            <tbody class="tbody-pdf">
                <tr>
                    <td colspan="2" heigth="80mm">
                        <div style="height: 80mm; font-size:11pt; text-align:justify;">
                            {{ $printer->descriptions }}
                        </div>

                    </td>
                </tr>
                <tr style="border: rgba(10, 10, 105, 0.856) 0.5em soild;">                        
  
                    <td width="35%">

                        <div style="width: 100%">
                            <p style="color: rgba(10, 10, 105, 0.856); font-size:10pt "><b
                                    style="text-align: center !important">Documento Adjunto: </b></p>
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
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de
                                            venta
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
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota de
                                            venta
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
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota
                                            de
                                            venta
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
                                            style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">Nota
                                            de
                                            venta
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
                        <div style="width: 100%;">
                            <p style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right">Proveedor:
                                </b></p>

                            <span><b> {{ $printer->persona->names }}</b></span><br><br><br>
                            <span style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right">Anticipo
                                    al Proveedor Monto $us/Bs.: </b></span>
                            <span style="font-size:11pt; "><b class="text-left" style="text-align: right !important;">@php  echo number_format($printer->adelanto,2);@endphp</b></span><br>
                            <span style="color: rgba(10, 10, 105, 0.856); font-size:9pt; "><b class="text-right"
                                    style="text-align: left !important;">Total a Pagar $us/Bs.: </b></span>
                            <span style="font-size:11pt; text-align:right !important;"><b class="text-right">@php  echo number_format($printer->monto,2);@endphp</b></span>
                        </div>
                    </td>
                </tr>
                <tr style="border: ridge; border-radius:0.5em; border-color:rgba(10, 10, 105, 0.856);">
                    <td colspan="2" width="100%" >
                        <div style="height: 20mm">
                            <span style="color: rgba(10, 10, 105, 0.856); font-size:8pt;"><b
                                    class="text-right">Observacion: </b></span><br>
                            <span style="font-size:10pt "><b> {{ $printer->observaciones }}</b></span>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table width="100%" style="color: rgba(10, 10, 105, 0.856); font-size:9pt ">
            <tr>
                <td>
                    <div style="text-align: center">
                        <span>.....................................................<br>Firma Solicitado Por </span>
                        <span style="text-align:left !important"><br>Nombre o Sello</span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <span><br>.....................................................</span>
                    </div>
                </td>
                <td>
                    <div style="text-align: center">
                        <span>.....................................................<br>Firma Jefe de Area V° B°</span>
                        <span style="text-align:left !important"><br>Nombre o Sello</span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <span><br>fecha: ..............................................</span>
                    </div>
                </td>
                <td>
                    <div style="text-align: center">
                        <span>.....................................................<br>Firma Autorizado Por</span>
                        <span style="text-align:left !important"><br>Nombre o Sello</span>
                        <br>
                        <br>
                        <span><br>Monto Aut.: .........................................</span>
                        <br>
                        <span><br>fecha: ..............................................</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" heigth="80mm">
                    <div class="text-center" style=" heigth: 80mm !important; text-align: center !important; border: ridge; border-radius:1em;">
                        <p style="color: rgba(10, 10, 105, 0.856); font-size:12pt "><b>AUTORIZACIÓN:</b>Para la
                            Autorización debera adjuntarse toda la documentación necesaria
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@endsection
