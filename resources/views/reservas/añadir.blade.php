
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
        <form method="POST" action="{{ route('reserve.add') }}" >
            @csrf
            @method('POST')

            <label for="diaReserva">Día de la reserva: </label>
            <input type="date" name="diaReserva" id="diaReserva" value="<?php if (isset($fecha)) echo $fecha ?>" required>
            <script>
                document.getElementById('diaReserva').addEventListener('change', function() {
                    var newDate = this.value;
                    location.href = "/reservarAula/" + newDate;
                })
            </script>

            <label for="aula">Aula a reservar: </label>
            <select name="aula" id="aula" required>
                <?php
                if(isset($aulas))
                    foreach($aulas as $aula)
                    {
                        if( isset($aulaSeleccionada)  && $aula == $aulaSeleccionada)
                            echo "<option value='$aula' selected>$aula</option>";
                        else
                            echo "<option value='$aula'>$aula</option>";
                    }
                ?>
            </select>
            <script>
                document.getElementById('aula').addEventListener('change', function() {
                    if(window.location.href.includes('reservarAula') && window.location.href.split('/').length === 6)
                    {
                        let url = window.location.href;
                        let newURL = url.split('/');
                        newURL.pop();
                        newURL.push(this.value);


                        location.href = newURL.join('/');
                    }
                    else
                        location.href += "/" + this.value;
                })
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


            <input type="submit" value="Reservar">
        </form>
    </div>
</section>
@endsection