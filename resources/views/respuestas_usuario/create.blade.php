@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Responder Cuestionario: {{ $cuestionario->nombre_cuestionario }}</h1>

        <form action="{{ route('respuestas_usuario.guardarRespuestas', ['id' => $cuestionario->idCU]) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="datetime-local" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
            </div>

            <h2>Preguntas:</h2>

            @foreach ($preguntas as $pregunta)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Pregunta ({{ $pregunta->idPregunta }}): {{ $pregunta->Pregunta }}</h5>

                        @if ($pregunta->tipoPregunta->nombre === 'Opción Múltiple')
                            <p>Opciones de respuesta:</p>
                            @foreach ($pregunta->opcionesRespuestas as $opcion)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="respuesta[{{ $pregunta->idPregunta }}]" id="opcion{{ $opcion->id }}" value="{{ $opcion->contenido }}">
                                    <label class="form-check-label" for="opcion{{ $opcion->id }}">
                                        {{ $opcion->contenido }}
                                    </label>
                                </div>
                            @endforeach
                        @else
                            <textarea name="respuesta[{{ $pregunta->idPregunta }}]" class="form-control" rows="3" required></textarea>
                        @endif
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Guardar Respuestas</button>
        </form>
    </div>
@endsection
