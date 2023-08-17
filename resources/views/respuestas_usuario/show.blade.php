@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Respuesta de Usuario</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $respuestaUsuario->idRU }}</h5>
                <p class="card-text">ID Cuestionario Usuario: {{ $respuestaUsuario->idCU }}</p>
                <p class="card-text">ID Pregunta: {{ $respuestaUsuario->idPregunta }}</p>
                <p class="card-text">Respuesta: {{ $respuestaUsuario->Respuesta }}</p>
                <a href="{{ route('respuestas_usuario.edit', $respuestaUsuario->idRU) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('respuestas_usuario.destroy', $respuestaUsuario->idRU) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
