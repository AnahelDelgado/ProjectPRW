@extends('layout.layout')

@section('content')
<!-- Contenido específico de esta página -->
<section class="">
    <div class="formulario">

        <h3>Añadir Aula y material</h3>
        <form action="">
            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" required>

            <label for="horaInicioReserva">Hora de inicio de la reserva: </label>
            <input type="time" name="horaInicioReserva" id="horaInicioReserva" value="08:00" required>

            <label for="horaFinalReserva">Hora final de la reserva: </label>
            <input type="time" name="horaFinalReserva" id="horaFinalReserva" value="14:00" required>

            <label for="cantidadAlumnos"> Cantidad de alumnado: </label>
            <input type="number" name="cantidadAlumnos" id="cantidadAlumnos" required>

            <input type="submit" value="Continuar">
        </form>
    </div>
</section>
@endsection