@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Cuestionario Usuario</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cuestionarios_usuario.update', $cuestionarioUsuario->idCU) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="idCuestionario">Cuestionario:</label>
                <select name="idCuestionario" id="idCuestionario" class="form-control" required>
                    @foreach ($cuestionarios as $cuestionario)
                        <option value="{{ $cuestionario->idCuestionario }}" {{ $cuestionarioUsuario->idCuestionario == $cuestionario->idCuestionario ? 'selected' : '' }}>{{ $cuestionario->nombre_cuestionario }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="FechaInicio">Fecha de Inicio:</label>
                <input type="datetime-local" name="FechaInicio" id="FechaInicio" class="form-control" value="{{ $cuestionarioUsuario->FechaInicio }}" required>
            </div>
            <div class="form-group mt-3">
                <label for="FechaFin">Fecha de Fin:</label>
                <input type="datetime-local" name="FechaFin" id="FechaFin" class="form-control" value="{{ $cuestionarioUsuario->FechaFin }}">
            </div>
            <div class="form-group mt-3">
                <label for="idUsuario">Usuario:</label>
                <select name="idUsuario" id="idUsuario" class="form-control" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $cuestionarioUsuario->idUsuario == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label for="idUsuarioOperador">Usuario Operador:</label>
                <select name="idUsuarioOperador" id="idUsuarioOperador" class="form-control" required>
                    @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}" {{ $cuestionarioUsuario->idUsuarioOperador == $usuario->id ? 'selected' : '' }}>{{ $usuario->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('cuestionarios_usuario.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
