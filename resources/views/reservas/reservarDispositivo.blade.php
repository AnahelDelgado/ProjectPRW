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
<section id="add-form">
    <div class="formulario2">

        <h3>Añadir Aula</h3>
        <?php if(isset($fecha))
        {
            $actionUrl = route("secciones.dispositivos", ["fecha" => $fecha, "hora_inicio-hora_final" => $horas["horasInicio"][0] . "-" . $horas["horasFin"][0]]);
            echo '<form method="POST" action="' . $actionUrl . '">';
        }
        else
            echo '<form method="POST" action="{{ route("secciones.dispositivos") }}">';
        ?>
            @csrf
            @method('POST')
            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" value="<?php if (isset($fecha)) echo $fecha ?>" required>


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
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('continuar').addEventListener('click', function() {
                        let fecha = document.getElementById('diaReserva').value;
                        let horaInicio = document.getElementById('horaInicioReserva').value;
                        let horaFinal = document.getElementById('horaFinalReserva').value;
                        location.href = "/reservarMaterial/" + fecha + "/" + horaInicio + "/" + horaFinal; // Redirigir a la página principal
                    });
                });
            </script>

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