<?php $viewData = session()->get('viewData'); ?>
<?php
if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}
?>

@section('head')
<link rel="stylesheet" href="{{asset('/css/editar.css')}}">
@endsection

@extends('layout.layout')
@section('imagen')
<img class="avatar" src="<?php echo $viewData['avatar'] ?>" alt="" srcset="">
@endsection

@section('nombre')
<?php echo $viewData['nombre'] ?>
@endsection

@section('content')
<div class="cuadrado">
    <h2 class="titulo">Editar reserva</h2>
    <form action="{{ route('reservas.editar') }}" method="POST">
        @method('PUT')
        @csrf
        <label for="reserva">Seleccionar reserva a editar:</label><br>
        <select name="reserva" id="reserva">
            @foreach($reservas as $reserva)
            <option value="{{ $reserva->id }}">{{ $reserva->dia }} - {{ $reserva->hora_inicio }} {{ $reserva->hora_fin }}</option>
            @endforeach
        </select><br>
        <!-- Aquí van los campos para editar la reserva -->
        
        <label for="diaReserva">Día de la reserva:</label><br>
        <input type="date" name="diaReserva" id="diaReserva" required><br>

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

        <input type="submit" value="Guardar Cambios">
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

@endsection