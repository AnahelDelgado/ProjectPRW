@extends('layout.layout2')
@section('head')
<link rel="stylesheet" href="{{asset('/css/eleccion.css')}}">
@endsection
@section('content')

<div class="buttons">
    <a href="/reservas/eliminar" class="button">Eliminar reserva aula</a>
    <a href="/reservas/eliminarMaterial" class="button">Eliminar reserva material</a>
</div>

@endsection