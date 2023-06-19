<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="style/main.css">
    <!-- Agrega el enlace a la hoja de estilo de Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>proyecto</title>
</head>

<body>

<header>
    <div class="company-logo">"The Component Store"</div>
    <nav class="navbar">
        <ul class="nav-items">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('imain') ? 'active' : '' }}" href="{{ route('imain') }}">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('categorias') ? 'active' : '' }}" href="{{ route('categorias') }}">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('sobre') ? 'active' : '' }}" href="{{ route('sobre') }}">Sobre Nosotros</a>
            </li>

            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">INICIAR SESION</a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('sobre') ? 'active' : '' }}" href="{{ route('carrito') }}">Carrito de compras</a>
                </li>
                @if(Auth::user()->id_rol==2)
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('paneladm') ? 'active' : '' }}" href="{{ route('paneladm') }}">Panel Administrador</a>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>

            @endguest
        </ul>
    </nav>
    <div class="menu-toggle">
        <i class="bx bx-menu"></i>
        <i class="bx bx-x"></i>
    </div>
</header>


@yield('principal')


<!--Footer
    <footer>
        <p class="copyright">
            Arma tu gabinete y compra tu mejor laptop gamer con nosotos , confinza y grantia Llamanos al telefo
            0180055902 y aparta tu pc gamer Siguenos en todas nuestra Redes sociales Facebook Twiter
        </p>
    </footer>
    -->

<footer>
    <div class="end-footer">
        <div class="copyright">copyright © 2023 - Presenta • <b></b></div>
        <a class="designer" href="#"></a>
    </div>
</footer>

<script src="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

</body>

</html>
