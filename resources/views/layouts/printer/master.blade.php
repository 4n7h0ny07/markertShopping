<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ setting('site.title') }}</title>

    <?php $admin_favicon = Voyager::setting('admin.icon_image', ''); ?>
    @if ($admin_favicon == '')
        <link rel="shortcut icon" href="{{ asset('images/icon.ico') }}" type="image/ico">
    @else
        <link rel="shortcut icon" href="{{ Voyager::image($admin_favicon) }}" type="image/ico">
    @endif

    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: Arial, Helvetica, sans-serif
        }

        #watermark {
            position: fixed;
            top: 250px;
            opacity: 0.1;
            z-index: -1;
            width: 100%;
            text-align: center
        }

        #watermark img {
            position: relative;
            width: 300px;
            /* left: 220px; */
        }
    </style>
    @yield('css')
</head>

<body>
    @php
        $icon = setting('admin.icon_image') ? url('storage') . '/' . setting('admin.icon_image') : asset('images/logo_a.png');
    @endphp
        {{-- <div id="watermark">
            <img src="{{ $icon }}" /> 
        </div> --}}

        <div>
            <table width="100%">
                <tr>
                    <td width="35%">
                        <table>
                            <tr>
                                <td>
                                    <div style="margin-right:10px">
                                        <img src="{{ asset('images/logo_a.png') }}" width="60px" />
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <h1 style="margin: 0px; padding: 0px; font-size: 18px; font-weight: bold;">
                                            {{ setting('site.title') }}
                                        </h1>
                                        <h3 style="margin: 0px; padding: 0px; font-size: 12px; font-weight: 100;">
                                            {{ setting('site.address') }}
                                        </h3>
                                        <h3 style="margin: 0px; padding: 0px; font-size: 12px; font-weight: 100;">
                                            {{ setting('site.phones') }}
                                        </h3>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td align="center" width="75%">
                        <div class="col-md-12 text-center">
                            <h3 style="color: rgba(10, 10, 105, 0.856)">
                                FORMULARIO DE REQUERIMIENTO INTERNO <br> <small
                                    style="color: rgba(10, 10, 105, 0.856)">MATERIALES, SUMINISTROS Y OTROS</small>
                            </h3>
    
                            @switch($printer->tipo_requerimiento)
                                @case('Compra')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">COMPRA
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">PAGO
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">FONDO EN AVANCE
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">CONSUMO
                                    </label>
                                </div>
                                @break
    
                                @case('Pago')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">COMPRA
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">PAGO
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">FONDO EN AVANCE
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">CONSUMO
                                    </label>
                                </div>
                                @break
    
                                @case('Fondo en Avance')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" role="switch" 
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">COMPRA
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">PAGO
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">FONDO EN AVANCE
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">CONSUMO
                                    </label>
                                </div>
                                @break
    
                                @case('Consumo')
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" role="switch" 
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">COMPRA
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">PAGO
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">FONDO EN AVANCE
                                    </label>
                                    <input class="form-check-input" type="checkbox" role="switch" checked="checked"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault" 
                                        style="color:rgba(10, 10, 105, 0.856); font-size:10pt; font-weight:bold">CONSUMO
                                    </label>
                                </div>
                                @break
                            @endswitch
    
                            <b style="color: rgb(250, 3, 3); font-size:13pt; font-weight:bold">N°
                                {{ $printer->number }}/@php echo date('Y')@endphp</b>
    
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    
        @yield('content')
</body>

</html>
