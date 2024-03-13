<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{asset('/css/index.css')}}">
  <!-- Google Font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <title>Login Profesorado</title>
</head>
<body>
  <section class="container">
    <div class="content">
      <img src="/img/a_de_ateca.png" alt="Foto del aula" class="logoAteca">
    </div>

    <div class="content">
      <div class="wrapper-form">

        <h3>Inicio de Sesión</h3>
        <form action="">
          <div class="wrapper-input">
            <label for="emailUser">Correo electrónico</label>
          </div>
            <input type="email" name="emailUser" id="emailUser" placeholder="Correo electronico">

          <div class="wrapper-input">
            <label for="psswdUser">Contraseña</label>
          </div>
          <input type="password" name="psswdUser" id="psswdUser" placeholder="Contrasenia">

          <input type="submit" value="Login">
        </form>

      </div>
    </div>
  </section>
</body>
</html>