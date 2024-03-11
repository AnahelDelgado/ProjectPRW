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
@section('content')
<div class="contorno">
<!-- Título -->
<h1>Eliminar Aula</h1>
<!-- Formulario -->
<form action="/reservas/eliminaraula" method="POST">
    @csrf
    <label for="aula">Seleccionar aula a eliminar:</label><br>
    <select name="aula" id="aula" required>
        <option value="aula1">Aula 1</option>
        <option value="aula2">Aula 2</option>
        <!-- Agrega más opciones según las aulas disponibles -->
    </select><br>
    <input type="submit" value="Eliminar Aula">
</form>
</div>
@endsection