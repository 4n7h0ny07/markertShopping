@extends('voyager::master')

@section('page_titlle', 'Viendo Importar')

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="page-title">
                    <i class="voyager-credit-cards"></i> Correos de {{ $names }}
                </h1>
            </div>
            {{-- <div class="col-md-7 text-right" style="margin-top: 40px">
                <p>Puedes descargar el archivo  Excel </p>
            </div> --}}

        </div>
    </div>
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <form action="#" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4" style="width: 150mm; height: 200mm; max-height: 300mm; overflow-y: auto">
                    <div class="panel panel-bordered">
                        <div class="panel-body">
                            <div class="table-responsive">
                                @if (count($correos) > 0)
                                    <table class="table">
                                        <thead class="table-dark">
                                            <tr>
                                                <th
                                                    style="font-size: 12pt; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align:center; ">
                                                    Enviado Por</th>
                                                <th
                                                    style="font-size: 12pt; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; text-align:center; ">
                                                    Asunto</th>
                                            </tr>
                                        </thead>
                                        @foreach ($correos as $correo)
                                            <tbody>
                                                <tr>
                                                    {{-- <td >{{ $correo[0]->message_id }}</td> --}}
                                                    <td style="font-family: 'Times New Roman', Times, serif; font-size:11pt; width:5mm; ">{{ $correo[0]->from }}</td> 
                                                    <td style="font-family: 'Courier New', Courier, monospace; font-size:10pt; width:5mm; ">{{ utf8_decode($correo[0]->subject) }}</td>
                                                    {{-- <td>{{ $correo[0]->date }}</td> --}}
                                                </tr>
                                            </tbody>
                                        @endforeach
                                    </table>


                                    <!-- Muestra los enlaces de paginación con intervalos -->
                                    <div class="pagination">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item {{ $correos->currentPage() == 1 ? 'disabled' : '' }}">
                                                <a class="nav-link" href="{{ $correos->url(1) }}"><i
                                                        class="voyager-double-left"></i></a>
                                            </li>

                                            @if ($correos->currentPage() > 5)
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ $correos->url(1) }}">1</a>
                                                </li>
                                                <li class="disabled"><span>...</span></li>
                                            @endif

                                            @for ($i = max(1, $correos->currentPage() - 1); $i <= min($correos->currentPage() + 1, $correos->lastPage()); $i++)
                                                <li class="nav-item {{ $correos->currentPage() == $i ? 'active' : '' }}">
                                                    <a class="nav-link"
                                                        href="{{ $correos->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            @if ($correos->currentPage() < $correos->lastPage() - 2)
                                                <li class="disabled"><span>...</span></li>
                                                <li class="nav-item">
                                                    <a class="nav-link"
                                                        href="{{ $correos->url($correos->lastPage()) }}">{{ $correos->lastPage() }}</a>
                                                </li>
                                            @endif

                                            <li
                                                class="nav-item {{ $correos->currentPage() == $correos->lastPage() ? 'disabled' : '' }}">
                                                <a class="nav-link" href="{{ $correos->url($correos->lastPage()) }}"><i
                                                        class="voyager-double-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                @else
                                    <p>No hay correos disponibles.</p>
                                @endif
                            </div>


                        </div>
                    </div>
                </div>
                <div class="col-md-8" style="height: 200mm; max-height: 370mm; overflow-y: auto">
                    <div class="panel panel-bordered">
                        <div class="panel-body">

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@stop
