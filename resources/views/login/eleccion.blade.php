@extends('layout.layout2')
@section('head')
<link rel="stylesheet" href="{{asset('/css/eleccion.css')}}">
@endsection
@section('content')
<div class="buttons">
   
    <a href="/reservarMaterial" class="button">Reservar material</a>
    <a href="/reservaAula" class="button">Reservar aula</a>
</div>
@endsection