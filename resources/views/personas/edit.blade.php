@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Persona</h1>
        <form action="{{ route('personas.update', $persona->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $persona->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $persona->apellido }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $persona->email }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $persona->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $persona->direccion }}" required>
            </div>
            <div class="form-group">
                <label for="colonia_id">Colonia</label>
                <select class="form-control" id="colonia_id" name="colonia_id" required>
                    <option value="">Seleccionar Colonia</option>
                    @foreach ($colonias as $colonia)
                        <option value="{{ $colonia->id }}" {{ $colonia->id === $persona->colonia_id ? 'selected' : '' }}>{{ $colonia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="estado_id">Estado de Simpatía</label>
                <select class="form-control" id="estado_id" name="estado_id" required>
                    <option value="">Seleccionar Estado de Simpatía</option>
                    @foreach ($estadosSimpatia as $estado)
                        <option value="{{ $estado->id }}" {{ $estado->id === $persona->estado_id ? 'selected' : '' }}>{{ $estado->estado }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('personas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
