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

@section('head')
<link rel="stylesheet" href="{{asset('/css/grid.css')}}">
@endsection

@section('content')


<div class="SeccionGrid">
    <!-- Div 1: Reserva de Aula -->
    <div class="dentro">
        <nav class="mh">
            <input class="menu2" type="checkbox" id="menu1">
            <label class="menu" for="menu1">☰</label>
            <ul class="el">
                <li class="opcion">Editar</li>
                <li class="opcion">Eliminar</li>
            </ul>
        </nav>
        <h1 class="aula">Aula</h1>
        <div class="fotog">
            <img src="/img/aula.jpeg" alt="Editar">
        </div>
        <label class="n1" for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <label class="f1" for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <label class="t1" for="hora">Hora:</label>
        <input type="time" id="hora" name="hora">
    </div>

    <!-- Div 2: Reserva de Material -->
    <div class="dentro2">
        <nav class="mh">
            <input class="menu2" type="checkbox" id="menu2">
            <label class="menu" for="menu2">☰</label>
            <ul class="el">
                <li class="opcion">Editar</li>
                <li class="opcion">Eliminar</li>
            </ul>
        </nav>
        <h1 class="material">Material</h1>
        <div class="fotog">
            <img src="/img/material.png" alt="Editar">
        </div>
        <label class="n1" for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre">
        <label class="n1" for="id">ID:</label>
        <input type="text" id="id" name="id">
        <label class="f1" for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha">
        <label class="t1" for="hora">Hora:</label>
        <input type="time" id="hora" name="hora">
    </div>
</div>
@endsection