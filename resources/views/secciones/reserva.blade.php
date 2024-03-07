<?php $viewData = session()->get('viewData'); ?>

@extends('layout.layout')

@section('imagen')
    <img class="avatar" src="<?php echo $viewData['avatar']?>" alt="" srcset="">
@endsection

@section('nombre')
    <?php echo $viewData['nombre']?>
@endsection

@section('content')
    <!-- Contenido específico de esta página -->
    <div class="content">
    </div>

@endsection

