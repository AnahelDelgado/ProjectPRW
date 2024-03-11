<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')
    <title>Eleccion</title>
</head>
<body>

<div class="container">
        <?php
        if (session()->get('user') === null) {
            header("Location: /login");
            exit;
        }
        ?>
        <!-- Título -->
        <h1>¿Qué quieres hacer?</h1>
        

        @yield('content')
        <!-- Botones -->
</body>
</html>