<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/login.css')}}">
  <title>Inicio sesion</title>
</head>

<body class="bodyLogin">
  <div class="cont">
    <h2 class="titulo">Reserva tu aula y material</h2>
    <p class="titulo">Inicia sesión aquí para poder reservar </p>

    <div class="CuadradoBlanco">
      <form class="formulario" action="" method="get">
        <h1 class="sesion">INICIAR SESIÓN CON GOOGLE</h1>

      </form>

      <!-- Botón de Iniciar sesión con Google -->
      <div class="google-login">
        <a href="/auth/google" class="google-btn">
          <img src="https://developers.google.com/identity/images/g-logo.png" alt="Google Logo" class="google-icon">
        </a>
        <p class="textoGoogle"> Iniciar sesión con google</p>

      </div>
    </div>
    <footer>
      <img class="logo" src="/img/a_de_ateca.png" />
    </footer>
  </div>
</body>

</html>