@extends('layouts.app')

@section('content')
    <h1>Agregar Candidato</h1>

    <form action="{{ route('candidatos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ old('apellido_paterno') }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ old('apellido_materno') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
        </div>

        <div class="form-group">
            <label for="partido_politico">Partido Político:</label>
            <input type="text" name="partido_politico" id="partido_politico" class="form-control" value="{{ old('partido_politico') }}" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
        </div>
       
        <div class="form-group">
            <label for="biografia">Biografía:</label>
            <textarea name="biografia" id="biografia" class="form-control" required>{{ old('biografia') }}</textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ old('estado') }}" required>
        </div>

        <div class="form-group">
            <label for="eleccion_id">Elección:</label>
            <select name="eleccion_id" id="eleccion_id" class="form-control" required>
                <option value="">Seleccionar Elección</option>
                @foreach ($elecciones as $eleccion)
                    <option value="{{ $eleccion->id }}">{{ $eleccion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ old('edad') }}" required>
        </div>

        <label for="posicion">Posición:</label>
            <select name="posicion" id="posicion" class="form-control" required>
                @foreach ($elecciones as $eleccion)
                    <option value="{{ $eleccion->id }}">{{ $eleccion->posicion }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Agregar</button>
        <a href="{{ route('candidatos.index') }}" class="btn btn-secondary">Volver</a>
    </form>
@endsection
