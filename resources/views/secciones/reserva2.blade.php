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
                <?php 
                    foreach($productosDisponibles as $productos)
                    {
                        echo '<div class="card swiper-slide">';
                        echo '<div class="image-content">';
                        echo '<span class="overlay"></span>';
                        echo '<div class="card-image">';
                        echo '<img src="' . $productos['imagen'] . '" alt="" class="card-img">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-content">';
                        echo '<h2 class="name">' . $productos['nombre'] . '</h2>';
                        echo '<p class="description">' . $productos['descripcion'] . '</p>';
                        echo '<button class="button add-product" id_producto="' . $productos['id'] . '">Añadir</button>';
                        echo '</div>';
                        echo '</div>';
                    }
                ?>
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
@section('scriptProducts')
<script src="JS/swiper-bundle.min.js"></script>
<script src="JS/script.js"></script>

@endsection