<?php
$viewData = session()->get('viewData');

if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}

$request->request->add(['fecha'=> $fecha, 'horaInicial' => $horaInicio, 'horaFinal' => $horaFinal]);
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
        <button type="submit" class="button">Reservar </button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener todos los elementos con la clase 'button' y la clase 'add-product'
            let botones = document.querySelectorAll('.button.add-product');
            let arrayProductos = [];
            // Iterar sobre todos los botones y agregar un evento de clic a cada uno
            botones.forEach(function(boton) {
                boton.addEventListener('click', function() {
                    // Obtener el id_producto del atributo id
                    let idProducto = this.getAttribute('id_producto');

                    // Crear un objeto de producto y agregar el id_producto
                    let producto = {
                        id_producto: idProducto
                        // Puedes agregar más propiedades del producto aquí si lo necesitas
                    };

                    // Agregar el producto al array de productos (si el array de productos ya existe)
                    // Si no existe, puedes crear uno nuevo y luego agregar el producto
                    arrayProductos.push(producto);

                    // Hacer algo con el array de productos, como enviarlo a través de una solicitud AJAX o almacenarlo en algún lugar
                    console.log(arrayProductos);
                });
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