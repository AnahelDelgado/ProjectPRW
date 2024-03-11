
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
        <h2 class="titulo">Editar Material</h2>
        <select name="reserva" id="reserva">
            <option value="reserva1">Reserva 1</option>
            <option value="reserva2">Reserva 2</option>
            <!-- Agrega más opciones según las reservas disponibles -->
        </select>
        <form action="" >
            <label for="material"  style="font-weight: bold ";>Seleccionar nuevo material:</label><br>
            <select name="material" id="material" required>
                <option value="material1">Material 1</option>
                <option value="material2">Material 2</option>
                <!-- Agrega más opciones según los materiales disponibles -->
            </select><br>
           
          
            <input type="submit" value="Guardar Cambios">
            <input type="submit" value="Cancelar">
        </form>
    </div>

 @endsection