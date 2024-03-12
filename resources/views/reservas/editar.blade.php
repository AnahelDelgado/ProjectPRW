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
    <form action="{{ route('reservas.editar') }}" method="POST">
        @csrf
        <label for="reserva">Seleccionar reserva a editar:</label><br>
        <select name="reserva" id="reserva">
            @foreach($reservas as $reserva)
                <option value="{{ $reserva->id }}">{{ $reserva->dia }} - {{ $reserva->horaInicio }} a {{ $reserva->horaFin }}</option>
            @endforeach
        </select><br>
        <!-- Aquí van los campos para editar la reserva -->
        <label for="diaReserva">Día de la reserva:</label><br>
        <input type="date" name="diaReserva" id="diaReserva" required><br>
        <label for="horaInicioReserva">Hora de inicio de la reserva:</label><br>
        <input type="time" name="horaInicioReserva" id="horaInicioReserva" required><br>
        <label for="horaFinalReserva">Hora final de la reserva:</label><br>
        <input type="time" name="horaFinalReserva" id="horaFinalReserva" required><br>
        <input type="submit" value="Guardar Cambios">
        <input type="submit" value="Cancelar">
    </form>
</div>

@endsection