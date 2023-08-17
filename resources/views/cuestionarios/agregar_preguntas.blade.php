@extends('layouts.app')

@section('content')
    <h1>Agregar Preguntas</h1>

    <form action="{{ route('cuestionarios.guardar_preguntas', $cuestionario->idCuestionario) }}" method="POST">
        @csrf

        <!-- Aquí van los campos del formulario para agregar preguntas -->
        <div class="form-group">
            <label for="pregunta">Pregunta:</label>
            <input type="text" name="preguntas[0][texto]" id="pregunta" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="opciones">Opciones:</label>
            <input type="text" name="preguntas[0][opciones][]" id="opciones" class="form-control" required>
        </div>
        <!-- Otros campos del formulario para agregar preguntas -->
        <div class="form-group">
            <label for="pregunta2">Pregunta 2:</label>
            <input type="text" name="preguntas[1][texto]" id="pregunta2" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="opciones2">Opciones 2:</label>
            <input type="text" name="preguntas[1][opciones][]" id="opciones2" class="form-control" required>
        </div>
        <!-- Otros campos del formulario para agregar preguntas -->

        <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
    </form>
@endsection
