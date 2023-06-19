@extends('index')
@section('principal')
    <main>
        <!-- HOME SECTION -->
        <section class="section-1">
            <div class="slogan">
                <h1 class="company-title">VENTA DE COMPONENTES DE COMPUTADORAS</h1>
                <h2 class="company-slogan">
                    los mejores componentes del mercado solo con nosotros.
                </h2>
                <a class="btn btn-warning" href="{{ route('categorias') }}">ver productos</a>
            </div>
            <div class="home-computer-container">
                <img class="home-computer"
                     src="https://github.com/r-e-d-ant/Computer-store-website/blob/main/assets/images/home_img.png?raw=true"
                     alt="a computer in dark with shadow" class="home-img">
            </div>
        </section>
    </main>
@endsection
