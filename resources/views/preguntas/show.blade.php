@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Pregunta</h1>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">ID: {{ $pregunta->id }}</h5>
            <p class="card-text">Cuestionario: {{ $pregunta->cuestionario->nombre }}</p>
            <p class="card-text">Pregunta: {{ $pregunta->pregunta }}</p>
            <p class="card-text">Tipo Pregunta: {{ $pregunta->tipoPregunta->nombre }}</p>
            <a href="{{ route('preguntas.edit', $pregunta->id) }}" class="btn btn-primary">Editar</a>
            <form action="{{ route('preguntas.destroy', $pregunta->idPregunta) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?')">Eliminar</button>
            </form>

        </div>
    </div>
</div>
@endsection