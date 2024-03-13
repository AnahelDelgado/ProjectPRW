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
<link rel="stylesheet" href="CSS/swiper-bundle.min.css">
<link rel="stylesheet" href="CSS/style.css">
@endsection
@section('imagen')
<img class="avatar" src="<?php echo $viewData['avatar'] ?>" alt="" srcset="">
@endsection
@section('content')
    <!-- Contenido específico de esta página -->
    <div class="slide-container swiper">
        <h1>Añadir materiales</h1>
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">

        @if(isset($productosDisponibles))
            @foreach ($productosDisponibles as $producto)
<div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <div class="card-image">
                            <img src="img/Impresora3D.jpg" alt="" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="name">Impresora 3D</h2>
                        <p class="description">Impresora 3D la cual se le puede dar uso para la impresión de casi cualquier diseño realizado por el alumnado.</p>
                        <button class="button add-product" id_producto="1">Añadir</button>
                    </div>
                </div>
            @endforeach
        @endif

            </div>
        </div>
        <div>
            <button type="submit" class="button">Reservar </button>
        </div>

    @section('scriptProducts')
        <script src="JS/swiper-bundle.min.js"></script>
        <script src="JS/slider.js"></script>
    @endsection
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
@endsection