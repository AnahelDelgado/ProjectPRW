<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/login.css')}}">
  <title>Inicio sesion</title>
</head>
<body class="bodyLogin">
  <div class="titulo">
    <h2>Reserva tu aula y material</h2>
    <p class="tp">Inicia sesión aquí para poder reservar </p>
  </div>
  <div class="CuadradoBlanco">
    <form class="formulario" action="" method="get">
      <h1 class="sesion">INICIAR SESIÓN CON GOOGLE</h1>
      <div class="f2">
          <input type="submit" value="Aceptar" class="boton">
      </div>
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
  <div class="link">
    <a href="https://www3.gobiernodecanarias.org/medusa/edublog/ieselrincon/">I.E.S El Rincón</a>.
  </div>
</body>
</html>