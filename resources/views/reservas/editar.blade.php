
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

<div class="cuadrado">
        <h2 class="titulo">Editar Reserva</h2>
        <select name="reserva" id="reserva">
            <option value="reserva1">Reserva 1</option>
            <option value="reserva2">Reserva 2</option>
            <option value="reserva2">Reserva 3</option>
            <option value="reserva2">Reserva 4</option>
            <!-- Agrega más opciones según las reservas disponibles -->
        </select>
        <form action="">
            <label for="diaReserva">Día de la reserva:</label><br>
            <input type="date" name="diaReserva" id="diaReserva" required><br>
            <label for="horaInicioReserva">Hora de inicio de la reserva:</label><br>
            <input type="time" name="horaInicioReserva" id="horaInicioReserva" required><br>
            <label for="horaFinalReserva">Hora final de la reserva:</label><br>
            <input type="time" name="horaFinalReserva" id="horaFinalReserva" required><br>
            <label for="cantidadAlumnos">Cantidad de alumnado:</label><br>
            <input type="number" name="cantidadAlumnos" id="cantidadAlumnos" required><br>
            <input type="submit" value="Guardar Cambios">
            <input type="submit" value="Cancelar">
        </form>
    </div>

@endsection



