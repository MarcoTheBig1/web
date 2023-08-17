@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Responder Cuestionario: {{ $cuestionario->nombre_cuestionario }}</h1>

    <form action="{{ route('respuestas_usuario.store') }}" method="POST">
        @csrf

        <div class="form-group mt-3">
            <label for="FechaInicio">Fecha de Inicio:</label>
            <input type="datetime-local" name="FechaInicio" id="FechaInicio" class="form-control" required>
        </div>

        <h2>Preguntas del Cuestionario</h2>
        @foreach ($preguntas as $pregunta)
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="card-title">Pregunta {{ $pregunta->idPregunta }}</h5>
                <p class="card-text">{{ $pregunta->Pregunta }}</p>
                @if ($pregunta->idTipoPregunta === 3) <!-- Pregunta de opción múltiple -->
                    <h6>Opciones de Respuesta:</h6>
                    <ul>
                        @foreach ($pregunta->opcionesRespuestas as $opcion)
                        <li>{{ $opcion->opcion }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-4">Guardar Respuestas</button>
    </form>
</div>
@endsection
