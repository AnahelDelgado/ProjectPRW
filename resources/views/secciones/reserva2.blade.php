<?php $viewData = session()->get('viewData'); ?>
<?php
if (session()->get('user') === null) {
    header("Location: /login");
    exit;
}
?>

@extends('layout.layout')

    <script src="JS/swiper-bundle.min.js"></script>
    <script src="JS/script.js"></script>
@endsection
@section('content')
    <!-- Contenido específico de esta página -->
    <div class="content">
      
    </div>

    @section('scriptProducts')
        <script src="JS/swiper-bundle.min.js"></script>
        <script src="JS/script.js"></script>
    @endsection
@endsection