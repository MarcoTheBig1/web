@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Pregunta</h1>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('preguntas.store') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label for="idCuestionario">ID Cuestionario:</label>
            <input type="text" class="form-control" id="idCuestionario" name="idCuestionario" value="{{ $cuestionario->idCuestionario }}" readonly>
        </div>

        @if (isset($nombreCuestionario))
        <div class="form-group mt-3">
            <label for="nombreCuestionario">Nombre del cuestionario:</label>
            <input type="text" class="form-control" value="{{ $nombreCuestionario }}" disabled>
        </div>
        @endif

        <div class="form-group mt-3">
            <label for="idTipoPregunta">Tipo Pregunta:</label>
            <select name="idTipoPregunta" id="idTipoPregunta" class="form-control" required>
                <option value="">Seleccionar tipo de pregunta</option>
                @foreach ($tiposPregunta as $tipoPregunta)
                <option value="{{ $tipoPregunta->idTipoPregunta }}">{{ $tipoPregunta->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-3" id="opcionesContainer" style="display: none;">
            <label for="opciones">Opciones:</label>
            <textarea name="opciones" id="opciones" class="form-control">{{ old('opciones') }}</textarea>
            <small class="form-text text-muted">Ingrese las opciones separadas por coma (,).</small>
        </div>

        <div class="form-group mt-3">
            <label for="pregunta">Pregunta:</label>
            <textarea name="pregunta" id="pregunta" class="form-control" required>{{ old('pregunta') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('preguntas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Obtener el elemento select del tipo de pregunta y el div que contiene los campos de opciones
            var tipoPreguntaSelect = $("#idTipoPregunta");
            var opcionesContainer = $("#opcionesContainer");

            // Función para mostrar u ocultar los campos de opciones según el tipo de pregunta seleccionado
            function toggleOpcionesContainer() {
                var tipoPreguntaValue = tipoPreguntaSelect.val();
                if (tipoPreguntaValue === "2" || tipoPreguntaValue === "3") {
                    opcionesContainer.show();
                } else {
                    opcionesContainer.hide();
                }
            }

            // Ejecutar la función cuando se carga la página y cuando se cambia el tipo de pregunta seleccionado
            toggleOpcionesContainer();
            tipoPreguntaSelect.on("change", function() {
                toggleOpcionesContainer();
            });
        });
    </script>
@endsection
