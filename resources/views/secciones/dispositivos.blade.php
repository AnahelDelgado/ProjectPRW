<?php
$viewData = session()->get('viewData');

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

@section('content')
<!-- Contenido específico de esta página -->
<div class="slide-container swiper">
    <h1>Añadir materiales</h1>
    <div class="slide-content">
        <div class="card-wrapper swiper-wrapper">

            <?php if (isset($productosDisponibles)) : ?>
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
                        <button class="button add-product" id="añadirProducto" id_producto="{{ $producto->id }}">Añadir</button>
                    </div>
                </div>
                @endforeach
            <?php endif; ?>


        </div>
    </div>

    <div>
        <form id="reservarMaterialForm" method="POST" action="{{ route('reservarMaterial.add') }}">
            @csrf
            @method('POST')
            <input type="hidden" name="fecha" value="<?php if (isset($fecha)) echo $fecha ?>">
            <input type="hidden" name="horaInicio" value="<?php if (isset($horaInicio)) echo $horaInicio?>">
            <input type="hidden" name="horaFinal" value="<?php if (isset($horaFinal)) echo $horaFinal?>">
            <input type="hidden" name="productos" id="productosInput">
            <button type="submit" class="button">Reservar</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        let botones = document.querySelectorAll('.button.add-product');
        let productos = [];
        botones.forEach(function(boton) {
            boton.addEventListener('click', function() {
                let idProducto = this.getAttribute('id_producto');
                let producto = {
                    'id_producto': idProducto
                    // You can add more product properties here if needed
                };
                productos.push(producto);
                console.log(productos);
            });
        });

        // Cuando se envía el formulario
        $('#reservarMaterialForm').on('submit', function(e) {
            e.preventDefault();

            // Set the productos array value to the hidden input field
            $('#productosInput').val(JSON.stringify(productos));

            // Submit the form
            this.submit();
        });
    });
    </script>
@section('scriptProducts')
    <script src="{{ asset('JS/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('JS/slider.js') }}"></script>
    @endsection
    <div class="swiper-button-next swiper-navBtn"></div>
    <div class="swiper-button-prev swiper-navBtn"></div>
    <div class="swiper-pagination"></div>
</div>
@endsection