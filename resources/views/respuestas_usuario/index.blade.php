@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Respuestas de Usuarios</h1>

    <a href="{{ route('respuestas_usuario.create') }}" class="btn btn-primary">Agregar Respuesta de Usuario</a>

    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cuestionario Usuario</th>
                <th>ID Pregunta</th>
                <th>Respuesta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($respuestasUsuario as $respuestaUsuario)
            <tr>
                <td>{{ $respuestaUsuario->idRU }}</td>
                <td>{{ $respuestaUsuario->idCU }}</td>
                <td>{{ $respuestaUsuario->idPregunta }}</td>
                <td>{{ $respuestaUsuario->Respuesta }}</td>
                <td>
                    <a href="{{ route('respuestas_usuario.show', $respuestaUsuario->idRU) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('respuestas_usuario.edit', $respuestaUsuario->idRU) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('respuestas_usuario.destroy', $respuestaUsuario->idRU) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta respuesta de usuario?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection