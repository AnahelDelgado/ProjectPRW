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
    <a href="/reservas/editarAula" class="button">Editar reserva aula</a>
    <a href="/reservas/editarmaterial" class="button">Editar reserva material</a>
</div>

@endsection
