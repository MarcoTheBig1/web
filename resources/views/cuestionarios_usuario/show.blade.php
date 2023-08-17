@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cuestionario Usuario</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $cuestionarioUsuario->idCU }}</h5>
                <p class="card-text">Cuestionario: {{ $cuestionarioUsuario->cuestionario->nombre_cuestionario }}</p>
                <p class="card-text">Fecha de Inicio: {{ $cuestionarioUsuario->FechaInicio }}</p>
                <p class="card-text">Fecha de Fin: {{ $cuestionarioUsuario->FechaFin }}</p>
                <p class="card-text">Usuario: {{ $cuestionarioUsuario->usuario->name }}</p>
                <p class="card-text">Usuario Operador: {{ $cuestionarioUsuario->usuarioOperador->name }}</p>
                <a href="{{ route('cuestionarios_usuario.edit', $cuestionarioUsuario->idCU) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('cuestionarios_usuario.destroy', $cuestionarioUsuario->idCU) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este cuestionario usuario?')">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
