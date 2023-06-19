@extends('index')
@section('principal')
    <link rel="stylesheet" href="css/categorias.css">
    <div class="main-section categories-view1-full">
        <span class="light-transparent"></span>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- FancyTitle -->
                    <div class="fancy-title-view1 fancy-title-view1-color">
                        <h2>Top Categorias</h2>
                        <p>Gran diversidad de categorias.</p>
                    </div>
                    <!-- FancyTitle -->

                    <!-- Categories List -->
                    <div class="categories categories-view1">
                        <ul class="row">
                            @foreach($categorias as $categoria)
                                <li class="col-md-4">
                                    <a href="{{ route('productos', ['clave'=>$categoria->id_categoria]) }}">
                                        <div class="categories-view1-wrap">
                                            <i class="fas fa-biohazard"></i>
                                            <a class="cadt" href="{{ route('productos', ['clave'=>$categoria->id_categoria]) }}">{{ $categoria->nombre_categoria }}</a>
                                            <a class="cadd" href="{{ route('productos', ['clave'=>$categoria->id_categoria]) }}">{{ $categoria->descripcion_categoria }}</a>
                                            <span></span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>

            </div>
        </div>
    </div>


@endsection
