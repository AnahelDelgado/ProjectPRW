<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Estilos -->
    <link rel="stylesheet" href="{{asset('/css/reserva.css')}}">
    <link rel="stylesheet" href="{{asset('/css/agregar.css')}}">
    <title>Reserva Aula</title>
    <link rel="stylesheet" href="CSS/swiper-bundle.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body class="bodyr1">

    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img class="logo2" src="/img/a_de_ateca.png" alt="Logo">
            </div>
            <div class="user">
                <a class="user-link">
                    <img src="/icons/user.png" alt="Usuario">
                    <span class="user-name">Usuario</span>
                </a>
            </div>
            <ul class="menu-options">
                <li>
                    <a href="/editar" class="menu-link">
                        <img src="/icons/editar.png" alt="Editar">
                        <span>Editar</span>
                    </a>
                </li>
                <li>
                    <a href="/eliminar" class="menu-link">
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

        <!-- contenido -->
        @yield('content')

    </div>

    <footer class="footer">
        <p>IES EL RINCÓN</p>
    </footer>

    <div class="misreservas">

        <input type="submit" value="Mis reservas" class="boton">

    </div>

    <!-- Dropdown para cambiar vista -->
    <div class="dropdown">
        <span style="font-size: 20px;">Cambiar vista</span>
        <div class="dropdown-content">
            <a href="#">Calendario</a>
            <a href="#">Pestañas Grid</a>
        </div>
    </div>

    <!-- Stack del calendario -->
    @stack('scripts')
</body>
<script src="JS/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="JS/script.js"></script>

</html>