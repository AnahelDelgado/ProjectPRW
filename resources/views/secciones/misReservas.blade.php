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
<link rel="stylesheet" href="{{asset('/css/grid.css')}}">
<link rel="stylesheet" href="CSS/swiper-bundle.min.css">
<link rel="stylesheet" href="CSS/style.css">
@endsection

@section('content')
    <!-- Contenido específico de esta página -->
    <div class="slide-container swiper">
        <div class="slide-content">
            <div class="card-wrapper swiper-wrapper">


                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <nav class="mh">
                            <div class="dropdown">
                                <button class="dropbtn">Opciones</button>
                                <div class="dropdown-content">
                                    <a href="#" class="edit-product" id_producto="1">Editar</a>
                                    <a href="#" class="delete-product" id_producto="1">Eliminar</a>
                                </div>
                            </div>
                        </nav>
                        <div class="card-image">
                            <img src="/img/material.png" alt="Editar" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h1 class="name2">Material</h1>
                        <label class="n1" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                        <label class="n1" for="id">ID:</label>
                        <input type="text" id="id" name="id">
                        <label class="f1" for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                        <label class="t1" for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <nav class="mh">
                            <div class="dropdown">
                                <button class="dropbtn">Opciones</button>
                                <div class="dropdown-content">
                                    <a href="#" class="edit-product" id_producto="1">Editar</a>
                                    <a href="#" class="delete-product" id_producto="1">Eliminar</a>
                                </div>
                            </div>
                        </nav>
                        <div class="card-image">
                            <img src="/img/material.png" alt="Editar" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h1 class="name2">Material</h1>
                        <label class="n1" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                        <label class="n1" for="id">ID:</label>
                        <input type="text" id="id" name="id">
                        <label class="f1" for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                        <label class="t1" for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                </div>




                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <nav class="mh">
                            <div class="dropdown">
                                <button class="dropbtn">Opciones</button>
                                <div class="dropdown-content">
                                    <a href="#" class="edit-product" id_producto="1">Editar</a>
                                    <a href="#" class="delete-product" id_producto="1">Eliminar</a>
                                </div>
                            </div>
                        </nav>
                        <div class="card-image">
                            <img src="/img/aula.jpeg" alt="Editar" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h1 class="name2">Aula</h1>
                        <label class="n1" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                        <label class="f1" for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                        <label class="t1" for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                </div>



                
                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <nav class="mh">
                            <div class="dropdown">
                                <button class="dropbtn">Opciones</button>
                                <div class="dropdown-content">
                                    <a href="#" class="edit-product" id_producto="1">Editar</a>
                                    <a href="#" class="delete-product" id_producto="1">Eliminar</a>
                                </div>
                            </div>
                        </nav>
                        <div class="card-image">
                            <img src="/img/aula.jpeg" alt="Editar" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h1 class="name2">Aula</h1>
                        <label class="n1" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                        <label class="f1" for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                        <label class="t1" for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                </div>

                <div class="card swiper-slide">
                    <div class="image-content">
                        <span class="overlay"></span>
                        <nav class="mh">
                            <div class="dropdown">
                                <button class="dropbtn">Opciones</button>
                                <div class="dropdown-content">
                                    <a href="#" class="edit-product" id_producto="1">Editar</a>
                                    <a href="#" class="delete-product" id_producto="1">Eliminar</a>
                                </div>
                            </div>
                        </nav>
                        <div class="card-image">
                            <img src="/img/aula.jpeg" alt="Editar" class="card-img">
                        </div>
                    </div>
                    <div class="card-content">
                        <h1 class="name2">Aula</h1>
                        <label class="n1" for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre">
                        <label class="f1" for="fecha">Fecha:</label>
                        <input type="date" id="fecha" name="fecha">
                        <label class="t1" for="hora">Hora:</label>
                        <input type="time" id="hora" name="hora">
                    </div>
                </div>


            </div>
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