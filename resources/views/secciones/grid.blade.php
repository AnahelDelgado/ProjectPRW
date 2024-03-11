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

<!-- Contenido específico del aula -->
<div class="SeccionGrid">
    <div class="dentro">

        <div class="foto">
            <img src="/img/aula.jpeg" alt="Editar">
        </div>

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">


        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">


        <label for="hora">Hora:</label>
        <input type="time" id="hora" name="hora">
    </div>
</div>


@endsection