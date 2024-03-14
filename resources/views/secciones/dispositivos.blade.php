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
<link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/slider.css') }}">
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

            <?php if(isset($productosDisponibles)): ?>
                @foreach ($productosDisponibles as $producto)
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
            <?php endif; ?>


            </div>
        </div>
        <div>
            <button type="submit" class="button">Reservar </button>
        </div>

    @section('scriptProducts')
        <script src="{{ asset('JS/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('JS/slider.js') }}"></script>
    @endsection
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
@endsection