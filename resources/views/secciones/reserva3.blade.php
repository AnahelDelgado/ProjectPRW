<?php $viewData = session()->get('viewData'); ?>
<?php
if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}
?>

@extends('layout.layout')
@section('imagen')
    <img class="avatar" src="<?php echo $viewData['avatar']?>" alt="" srcset="">
@endsection
@section('nombre')
    <?php echo $viewData['nombre']?>
@endsection


@section('content')
<!-- Contenido específico de esta página -->
<section class="">
    <div class="formulario3">

        <h3>Añadir Aula y material</h3>
        <form action="/reservaMaterial">
            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" required>

            <label for="horaInicioReserva">Hora de inicio de la reserva: </label>
            <input type="time" name="horaInicioReserva" id="horaInicioReserva" value="08:00" required>

            <label for="horaFinalReserva">Hora final de la reserva: </label>
            <input type="time" name="horaFinalReserva" id="horaFinalReserva" value="14:00" required>

            <label for="cantidadAlumnos"> Cantidad de alumnado: </label>
            <input type="number" name="cantidadAlumnos" id="cantidadAlumnos" required>

            <input type="submit" value="Continuar">
            
            <a class="cancelar" href="/" id="cancelButton">Cancelar</a>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('cancelButton').addEventListener('click', function(event) {
                        event.preventDefault(); // Evitar que se siga el enlace por defecto
                        window.location.href = "/"; // Redirigir a la página principal
                    });
                });
            </script>

        </form>
    </div>
</section>
@endsection