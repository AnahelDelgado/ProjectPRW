<?php
$viewData = session()->get('viewData');

if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}

$productos = \App\Models\Product::all();
?>

@extends('layout.layout')

@section('nombre', $viewData['nombre'])

@section('head')
<link rel="stylesheet" href="{{ asset('CSS/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('CSS/style.css') }}">
@endsection

@section('imagen')
<img class="avatar" src="{{ $viewData['avatar'] }}" alt="" srcset="">
@endsection

@section('content')
<!-- Contenido específico de esta página -->
<div class="slide-container swiper">
    <h1>Añadir materiales</h1>
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            @foreach($productos as $producto)
            <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
                    <div class="card-image">
                        <img src="{{ asset($producto->imagen) }}" alt="" class="card-img">
                    </div>
                </div>
                <div class="card-content">
                    <h2 class="name">{{ $producto->nombre }}</h2>
                    <p class="description">{{ $producto->descripcion }}</p>
                    <button class="button add-product" id_producto="{{ $producto->id }}">Añadir</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div>
        <button type="submit" class="button">Reservar </button>
    </div>
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
@endsection

@section('scriptProducts')
<script src="{{ asset('JS/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('JS/script.js') }}"></script>
@endsection
