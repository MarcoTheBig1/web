@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Pregunta</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('preguntas.update', $pregunta->idPregunta) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mt-3">
                <label for="cuestionario">Cuestionario:</label>
                <input type="text" class="form-control" id="cuestionario" value="{{ $pregunta->cuestionario->nombre_cuestionario }}" readonly>
                <input type="hidden" name="idCuestionario" value="{{ $pregunta->cuestionario->idCuestionario }}">
            </div>

            <div class="form-group mt-3">
                <label for="pregunta">Pregunta:</label>
                <textarea name="pregunta" id="pregunta" class="form-control" rows="4" required>{{ $pregunta->Pregunta }}</textarea>
            </div>

            <div class="form-group mt-3">
                <label for="tipo_pregunta_id">Tipo de Pregunta:</label>
                <select name="idTipoPregunta" id="tipo_pregunta_id" class="form-control" required>
                    @foreach ($tiposPregunta as $tipoPregunta)
                        <option value="{{ $tipoPregunta->idTipoPregunta }}" {{ $pregunta->idTipoPregunta == $tipoPregunta->idTipoPregunta ? 'selected' : '' }}>
                            {{ $tipoPregunta->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('preguntas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
