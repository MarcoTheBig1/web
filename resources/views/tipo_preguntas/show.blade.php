@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Tipo de Pregunta</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $tipoPregunta->nombre }}</h5>
                <p class="card-text">ID: {{ $tipoPregunta->id }}</p>
                <a href="{{ route('tipo_preguntas.edit', $tipoPregunta->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('tipo_preguntas.destroy', $tipoPregunta->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
