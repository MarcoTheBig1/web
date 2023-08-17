@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Cuestionario</h1>

    <form action="{{ route('cuestionarios.update', $cuestionario->idCuestionario) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fecha_creacion">Fecha de creación:</label>
            <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ old('fecha_creacion', $cuestionario->fecha_creacion) }}" required>
            @error('Fecha de creación')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nombre_cuestionario">Nombre del cuestionario:</label>
            <input type="text" class="form-control" id="nombre_cuestionario" name="nombre_cuestionario" value="{{ old('nombre_cuestionario', $cuestionario->nombre_cuestionario) }}" required>

            @error('Nombre del cuestionario')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="descripcion_cuestionario">Descripción del cuestionario:</label>
            <textarea class="form-control" id="descripcion_cuestionario" name="descripcion_cuestionario" rows="3" required>{{ old('descripcion_cuestionario', $cuestionario->descripcion_cuestionario) }}</textarea>
            @error('Descripción del cuestionario')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="estatus">Estatus:</label>
            <select class="form-control" id="estatus" name="estatus">
                <option value="1" {{ old('estatus', $cuestionario->estatus) == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ old('estatus', $cuestionario->estatus) == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection