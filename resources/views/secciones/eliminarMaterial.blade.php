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


 <!-- Título -->
 <div  class="contorno" >
 <h1>Eliminar Material</h1>
        
        <!-- Formulario -->
        <form action= "" >
            @csrf
            <label for="material">Seleccionar material a eliminar:</label><br>
            <select name="material" id="material" required>
                <option value="material1">Material 1</option>
                <option value="material2">Material 2</option>
                <!-- Agrega más opciones según los materiales disponibles -->
            </select><br>
            <input type="submit" value="Eliminar Material">
        </form>
</div>
@endsection