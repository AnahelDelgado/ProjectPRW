<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    if (session()->get('user') === null) {
        header("Location: /login");
        exit;
    } ?>

    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('/css/reserva.css')}}">
    <link rel="stylesheet" href="{{asset('/css/agregar.css')}}">
    <link rel="stylesheet" href="{{asset('/css/editar.css')}}">

    <title>Reserva Aula</title>
    @yield('head')
</head>

<body class="bodyr1">

    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img class="logo2" src="/img/a_de_ateca.png" alt="Logo">
            </div>
            <div class="user">
                <a href="/perfil" class="user-link">
                    <!-- Avatar del usuario -->
                    @yield('imagen')

                    <!-- Nombre del usuario -->
                    <span class="user-name">@yield('nombre')</span>
                </a>
            </div>
            <div class="cerrar sesion">
                <form action="/logout" method="POST">
                    @csrf
                    <input type="submit" value="Cerrar sesión" class="boton">
                </form>
            </div>

            <ul class="menu-options">

                <li>
                    <a href="/" class="menu-link">
                        <img src="/icons/inicio.png" alt="Inicio">
                        <span>Inicio</span>
                    </a>
                </li>


                <li>
                    <a href="/reservas/editar" class="menu-link">
                        <img src="/icons/editar.png" alt="Editar">
                        <span>Editar</span>
                    </a>
                </li>
                <li>
                    <a href="/reservas/eliminar" class="menu-link">
                        <img src="/icons/borrar.png" alt="Eliminar">
                        <span>Eliminar</span>
                    </a>
                </li>
                <li>
                    <a href="/eleccion" class="menu-link">
                        <img src="/icons/agregar.png" alt="Agregar">
                        <span>Agregar</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
            <!-- contenido -->
            @yield('content')
        </div>
    </div>

    <footer class="footer">
        <p>IES EL RINCÓN</p>
    </footer>


    
    <!-- Stack del calendario -->
    @stack('scripts')
</body>
@yield('scriptProducts')

</html>
