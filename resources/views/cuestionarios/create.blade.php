@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Cuestionario</h1>

        <form action="{{ route('cuestionarios.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="fecha_creacion">Fecha de creación:</label>
                <input type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" value="{{ old('fecha_creacion') }}" required>
                @error('fecha_creacion')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_cuestionario">Nombre del cuestionario:</label>
                <input type="text" class="form-control" id="nombre_cuestionario" name="nombre_cuestionario" value="{{ old('nombre_cuestionario') }}" required>
                @error('nombre_cuestionario')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion_cuestionario">Descripción del cuestionario:</label>
                <textarea class="form-control" id="descripcion_cuestionario" name="descripcion_cuestionario" rows="3" required>{{ old('descripcion_cuestionario') }}</textarea>
                @error('descripcion_cuestionario')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="estatus">Estatus:</label>
                <select class="form-control" id="estatus" name="estatus">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
