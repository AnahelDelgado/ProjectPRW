<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/reserva.css')}}">
    <title>Reserva Aula</title>
</head>

<body class="bodyr1">

    <div class="container">
        <div class="sidebar">
            <div class="logo">
                <img class="logo2" src="/img/a_de_ateca.png" alt="Logo">
            </div>
            <div class="user">
                <a href="/perfil" class="user-link">
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
                    <a href="/agregar" class="menu-link">
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
</body>

</html>