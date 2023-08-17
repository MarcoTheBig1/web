@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Eleccion</h1>
        <form action="{{ route('elecciones.update', $eleccion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $eleccion->nombre }}" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required>{{ $eleccion->descripcion }}</textarea>
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha Inicio</label>
                <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $eleccion->fecha_inicio }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha Fin</label>
                <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $eleccion->fecha_fin }}" required>
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="{{ $eleccion->estado }}" required>
            </div>
            <div class="form-group">
                <label for="posicion">Posición</label>
                <input type="text" class="form-control" id="posicion" name="posicion" value="{{ $eleccion->posicion }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
