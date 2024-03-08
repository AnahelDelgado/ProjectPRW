<!-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir reserva</title>
</head>
<body style="background-color: red;">
    <section class="">
        <h3>Añadir una reserva</h3>
        <div>
            <form action="">
                <label for="diaReserva">Día de la reserva: </label>
                <input type="date" name="diaReserva" id="diaReserva" required>

                <label for="horaInicioReserva">Hora de inicio de la reserva: </label>
                <input type="time" name="horaInicioReserva" id="horaInicioReserva" value="08:00" required>

                <label for="horaFinalReserva">Hora final de la reserva: </label>
                <input type="time" name="horaFinalReserva" id="horaFinalReserva" value="14:00" required>

                <label for="cantidadAlumnos"> Cantidad de alumnado: </label>
                <input type="number" name="cantidadAlumnos" id="cantidadAlumnos" required>

                <input type="submit" value="Reservar">
            </form>
        </div>
    </section>
</body>
</html> -->
<?php $viewData = session()->get('viewData'); ?>
<?php
if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}
?>

@extends('layout.layout')

@section('imagen')
<img class="avatar" src="<?php echo $viewData['avatar'] ?>" alt="" srcset="">
@endsection

@section('nombre')
<?php echo $viewData['nombre'] ?>
@endsection



@section('content')
<!-- Contenido específico de esta página -->
<section class="">
    <div class="formulario">

        <h3>Añadir Aula</h3>
        <form action="">
            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" required>

            <label for="horaInicioReserva">Hora de inicio de la reserva: </label>
            <input type="time" name="horaInicioReserva" id="horaInicioReserva" value="08:00" required>

            <label for="horaFinalReserva">Hora final de la reserva: </label>
            <input type="time" name="horaFinalReserva" id="horaFinalReserva" value="14:00" required>

            <label for="cantidadAlumnos"> Cantidad de alumnado: </label>
            <input type="number" name="cantidadAlumnos" id="cantidadAlumnos" required>

            <input type="submit" value="Reservar">
        </form>
    </div>
</section>
@endsection