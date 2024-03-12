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
<div class="contorno">
<!-- Título -->
<h1>Eliminar Aula</h1>
<!-- Formulario -->
<form action="{{ route('reservas.eliminar') }}" method="POST">
    @csrf
    @method('DELETE')
    <label for="reserva">Seleccionar reserva a eliminar:</label><br>
    <select name="reserva" id="reserva" required>
        @foreach($reservas as $reserva)
            <option value="{{ $reserva->id }}">{{ $reserva->dia }} - {{ $reserva->hora_inicio }} a {{ $reserva->hora_fin }}</option>
        @endforeach
    </select><br>
    <input type="submit" value="Eliminar Reserva">
</form>

</div>
@endsection