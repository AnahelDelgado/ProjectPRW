<?php
$viewData = session()->get('viewData');
if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}
?>
@extends('layout.layout')
@section('nombre', $viewData['nombre'])
@section('head')
<link rel="stylesheet" href="CSS/swiper-bundle.min.css">
<link rel="stylesheet" href="CSS/style.css">
@endsection
@section('imagen')
<img class="avatar" src="{{ $viewData['avatar'] }}" alt="">
@endsection
@section('content')
<div class="row">
    @foreach ($viewData["products"] as $product)
    <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
            @if ($product["image"])
                <img src="{{ asset($product["image"]) }}" class="img-fluid rounded-start" alt="{{ $product["name"] }}">
            @else
                <img src="{{ asset('/img/safe.jpg') }}" class="img-fluid rounded-start" alt="Placeholder Image">
            @endif
            <div class="card-body text-center">
                <a href="{{ route('product.show', ['id'=> $product["id"]]) }}" class="btn bg-primary text-white">{{ $product["name"] }}</a>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($viewData["products"] as $products)
        <div class="card swiper-slide">
            <div class="image-content">
                <span class="overlay"></span>
                <div class="card-image">
                    @if ($products["imagen"])
                        <img src="{{ asset("products["imagen"]") }}" alt="{{ $products["nombre"] }}" class="card-img">
                    @else
                        <img src="{{ asset('/img/safe.jpg') }}" class="card-img" alt="Placeholder Image">
                    @endif
                </div>
            </div>
            <div class="card-content">
                <h2 class="name">Impresora 3D</h2>
                <p class="description">Impresora 3D la cual se le puede dar uso para la impresión de casi cualquier diseño realizado por el alumnado.</p>
                <button class="button add-product" id_producto="1">Añadir</button>
            </div>
        </div>
    @endforeach
</div>
<!-- Contenido específico de esta página -->
<div class="slide-container swiper">
    <h1>Añadir materiales</h1>
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">
            <!-- Aquí van tus tarjetas -->
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
<script src="JS/swiper-bundle.min.js"></script>
<script src="JS/script.js"></script>
@endsection
