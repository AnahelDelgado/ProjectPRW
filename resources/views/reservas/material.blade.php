
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

        <h3>Reservar Material</h3>
        <form method="POST" action="">

            @csrf
            @method('POST')

            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" value="<?php if (isset($fecha)) echo $fecha ?>" required>
            <script>
                
            </script>


            <!-- Se mostrarán la horas disponibles del dia seleccionado -->
            <label for="horaInicioReserva">Hora de inicio de la reserva: </label>
            <select name="horaInicioReserva" id="horaInicioReserva" required>
                <?php if (isset($horas)) {
                    foreach ($horas['horasInicio'] as $hora) {
                        echo "<option value='$hora'>$hora</option>";
                    }
                } ?>
            </select>

            <label for="horaFinalReserva">Hora final de la reserva: </label>

            <select name="horaFinalReserva" id="horaFinalReserva" required>
                <?php if (isset($horas)) {
                    foreach ($horas['horasFin'] as $hora) {
                        echo "<option value='$hora'>$hora</option>";
                    }
                } ?>

            </select>


            <input type="button" value="Continuar" id="continuar">
                <script>
                 document.getElementById('continuar').addEventListener('click', function() {
                    location.href = "/reservarMaterial" + "/" + document.getElementById('diaReserva').value;
                 })
                </script>

            <input type="submit" value="Cancelar">
        </form>
    </div>
</section>
@endsection