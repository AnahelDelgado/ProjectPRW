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
<link rel="stylesheet" href="{{asset('/css/eliminar.css')}}">
@endsection

@section('content')

<!-- Título -->
<div class="contorno">
    <h1>Eliminar Material</h1>

    <!-- Formulario -->
    <form action="">
        @csrf
        <label for="material">Seleccionar material a eliminar:</label><br>
        <select name="material" id="material" required>
            <option value="material1">Material 1</option>
            <option value="material2">Material 2</option>

        </select><br>

        <label class="checkbox-container">
            <input type="checkbox">
            <span class="checkmark"></span>
            <span class="checkbox-label">Eliminar Aula</span>
        </label>
       

        <input type="submit" value="Eliminar">

        <a class="cancelar" href="/" id="cancelButton">Cancelar</a>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('cancelButton').addEventListener('click', function(event) {
                    event.preventDefault(); // Evitar que se siga el enlace por defecto
                    window.location.href = "/"; // Redirigir a la página principal
                });
            });
        </script>

    </form>
</div>
@endsection