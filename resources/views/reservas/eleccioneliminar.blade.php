@extends('layout.layout2')
@section('head')
<link rel="stylesheet" href="{{asset('/css/eleccion2.css')}}">
@endsection
@section('content')
        <?php
        if (session()->get('user') === null) {
            header("Location: /login");
            exit;
        }
        ?>

<div class="buttons">
    <a href="/reservas/eliminar" class="button">Eliminar reserva aula</a>
    <a href="/reservas/eliminarMaterial" class="button">Eliminar reserva material</a>
   
</div>

@endsection