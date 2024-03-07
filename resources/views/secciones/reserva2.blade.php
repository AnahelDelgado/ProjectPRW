@extends('layout.layout')
@section('head')
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/css/swiper-bundle.min.css')}}">
@endsection
@section('content')
    <!-- Contenido específico de esta página -->
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
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
                        <button class="button">Ver más</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="swiper-button-next swiper-navBtn"></div>
        <div class="swiper-button-prev swiper-navBtn"></div>
        <div class="swiper-pagination"></div>
    </div>
    <script src="/js/swiper-bundle.min.js"></script>
    <script src="/js/script.js"></script>
@endsection