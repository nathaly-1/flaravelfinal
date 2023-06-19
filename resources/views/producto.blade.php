@extends('index')
@section('principal')
    <link rel="stylesheet" href="/css/productos.css">
    <section class="section-products">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h3>Nuevos Productos</h3>
                        <h2>Productos Populares</h2>
                    </div>
                </div>
            </div>
            @include("notificacion")
            <div class="row">
                <!-- Single Product -->
                @foreach($componentes as $componente)
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <div id="product-4" class="single-product">
                            @php
                                $imagen = base64_encode($componente->imagen);
                            @endphp
                            <div class="part-1 img-fluid">

                                <img src="data:image/png;base64,{{$imagen}}" alt='Img blob desde MySQL'
                                     class="img-fluid"/>
                                <span class="new">new</span>
                                @guest()
                                @else
                                    <ul>
                                        <li>
                                            <a href="{{route('agregarpcarrito', ['id'=> $componente->clave_componente, 'cat'=>$cat])}}">
                                                <i class="fas fa-shopping-cart">
                                                </i></a>
                                        </li>
                                    </ul>
                                @endguest

                            </div>
                            <div class="part-2">
                                <h3 class="product-title">{{$componente->nombre_componente}}</h3>

                                <h3 class="product-title">{{$componente->descripcion_componente}}</h3>
                                <h4 class="product-price">{{$componente->precio_actual_componente}}</h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
