@extends('layout.layout2')

@section('head')
<link rel="stylesheet" href="{{asset('/css/eleccion.css')}}">
@endsection

@section('content')
        <?php
        if (session()->get('user') === null) {
            header("Location: /login");
            exit;
        }
        ?>

<div class="buttons">
    <a href="/reservaAulayMaterial" class="button">Reservar aula + material</a>
    <a href="/reservaMaterial" class="button">Reservar material</a>
    <a href="/reservaAula" class="button">Reservar aula</a>
</div>


@endsection