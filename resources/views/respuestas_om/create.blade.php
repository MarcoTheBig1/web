@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Respuesta OM</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('respuestas_om.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="idPregunta">Pregunta:</label>
                <select name="idPregunta" id="idPregunta" class="form-control" required>
                    @foreach ($preguntas as $pregunta)
                        <option value="{{ $pregunta->idPregunta }}">{{ $pregunta->Pregunta }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="Respuesta">Respuesta:</label>
                <input type="text" name="Respuesta" id="Respuesta" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('respuestas_om.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
