@extends('layouts.printer.master')

@section('content')
    <style>
        .paper {
            min-height: 45vh;
            background: repeating-linear-gradient(#ffffff, #ffffff 31px, #94ACD4 31px, #94ACD4 32px);

            font-family: cursive;
            font-size: 22px;
        }
    </style>
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
        <span style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">Saludos Cordiales: <br> Mediante el presente
            formulario hago la solicitud para el alta de un activo que se detalla a continuación</span>
        <table width="100%" style="font-size: 10pt; color:rgba(10, 10, 105, 0.856)">
            <thead>
                <th colspan="3" class="thead-pdf">
                    DESCRIPCION COMPLETA DEL ACTIVO
                </th>
            </thead>
            <tr>
                <td colspan="3" style="height:65mm">
                    <div class="paper" style="height: 66mm; font-size:11pt; text-align:justify;">
                        {{ $printer->descriptions }}
                    </div>
                </td>
            </tr>
            <tr>
                {{-- <td style="width: 40%; height:10mm">
                    <span>Fecha de Compra: </span> @php echo date('d F Y', strtotime($printer->created_at)); @endphp
                </td> --}}
                <td style="width: 30%; height:10mm">
                    <span>Vida Util: </span> {{ $printer->vida_util }} años.
                </td>
                <td style="width: 30%; height:10mm">
                    <span>Costo de Compra: </span> {{ $printer->costo }}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <span>Activar como responsable a: </span> {{ $printer->persona->names }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="col-md-12">
                        <p style="font-size: 11pt; text-align:center;">Datos Necesarios</p>
                        <span style="font-size: 11pt;"><strong>Marca:</strong></span><span style="font-size: 11pt;">{{ $printer->marca }}</span><br>
                        <span style="font-size: 11pt;"><strong>Modelo:</strong></span><span style="font-size: 11pt;">{{ $printer->modelo }}</span><br>
                        <span style="font-size: 11pt;"><strong>Nombre del Activo:</strong></span><span style="font-size: 11pt;">{{ $printer->name }}</span><br>
                        <span style="font-size: 11pt;"><strong>Numero Serie:</strong></span><span style="font-size: 11pt;">{{ $printer->serialNumber }}</span>


                    </div>
                </td>
                
                <td style ="vertical-align:text-top;">
                    <div class="col-md-12"
                        style="/*height: 75mm !important;*/ /*border: ridge; border-radius:1em; border-color: rgba(10, 10, 105, 0.856);*/">
                        <p style="font-size: 11pt; text-align:center;">Foto/Iamgen</p>

                    </div>
                </td>
            </tr>
            <tr style="border: ridge; border-radius:0.5em; border-color:rgba(10, 10, 105, 0.856);">
                <td colspan="2" width="100%">
                    <div style="height: 15mm">
                        <span style="color: rgba(10, 10, 105, 0.856); font-size:8pt;"><b class="text-right">Observacion:
                            </b></span><br>
                        <span style="font-size:10pt "><b> {{ $printer->observaciones }}</b></span>
                    </div>
                </td>
            </tr>
        </table>
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
                        <span>.....................................................<br>Recibido Por:</span>
                        <span style="text-align:left !important"><br>Nombre o Sello</span>
                        <br>
                        <br>
                        <br>
                        <br>
                        <span><br>fecha: ..............................................</span>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="3" heigth="60mm">
                    <div class="text-center"
                        style=" heigth: 60mm !important; text-align: center !important; border: ridge; border-radius:1em;">
                        <p style="color: rgba(10, 10, 105, 0.856); font-size:12pt "><b>ACTIVACION:</b>Para la
                            activacion debera adjuntarse una copia de la factura de la compra.
                        </p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
@endsection
