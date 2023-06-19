@extends('index')
@section('principal')
    <div style="text-align: center; color: #c2e8f6;">
        <h1>Bienvenido {{Auth::user()->name}}</h1>
    </div>
    <div id="componentesADmi">
        <div class="container">
            <div class="row">
                <div class='col-md-12 col-12 mb-4'>
                    <div class='card h-100'>
                        <a href="{{ route('categoriaslb') }}">
                            <div class='card-body'>
                                <h2 class='card-title'>Modificación de categorías</h2>
                                <h4 class='card-text'>Creacion, Edicion y Eliminacion de categorias</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class='col-md-12 col-12 mb-4'>
                    <div class='card h-100'>
                        <a href="{{ route('marcaslb') }}">
                            <div class='card-body'>
                                <h2 class='card-title'>Modificación de marcas</h2>
                                <h4 class='card-text'>Creacion, Edicion y Eliminacion de marcas</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class='col-md-12 col-12 mb-4'>
                    <div class='card h-100'>
                        <a href="{{ route('componenteslb') }}">
                            <div class='card-body'>
                                <h2 class='card-title'>Modificación de componentes</h2>
                                <h4 class='card-text'>Creacion, Edicion y Eliminacion de componentes</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
