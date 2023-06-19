@extends('index')
@section('principal')

    <div id="componentesADmi"
        style="position: absolute; top: 0; bottom: 0; left: 0; right: 0; display: flex; justify-content: center; align-items: center;">
        <div class="container">
            <div class="row">
                <div class='col-md-12 col-12 mb-4'>
                    <div class='card h-100 text-center'>
                        <h1>
                            @if ($tipo == 'marca')
                                @if ($action == 'eliminar')
                                    Eliminar Marca
                                @elseif ($action == 'agregar')
                                    Agregar Marca
                                @endif
                            @else
                                Detalles
                            @endif

                        </h1>
                        <h4>
                            @if ($tipo == 'marca')
                                @if ($action == 'eliminar')
                                    la marca: {{ $marca->nombre_marca }} se ha eliminado con exito
                                @elseif ($action == 'agregar')
                                    la marca: {{ $marca->nombre_marca }} se ha agregado con exito
                                @endif
                            @else
                                Detalles
                            @endif

                        </h4>
                        <a href="{{ route('paneladm') }}">
                            <h3>volver al inicio</h3>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
