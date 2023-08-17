@extends('layouts.app')

@section('content')
    <h1>Editar Candidato</h1>

    <form action="{{ route('candidatos.update', $candidato->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $candidato->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ $candidato->apellido_paterno }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ $candidato->apellido_materno }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $candidato->email }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $candidato->telefono }}" required>
        </div>

        <div class="form-group">
            <label for="partido_politico">Partido Político:</label>
            <input type="text" name="partido_politico" id="partido_politico" class="form-control" value="{{ $candidato->partido_politico }}" required>
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="file" name="foto" id="foto" class="form-control-file">
            @if ($candidato->foto)
                <img src="{{ asset('storage/fotos/' . $candidato->foto) }}" alt="{{ $candidato->nombre }}" style="width: 100px;">
            @endif
        </div>

        <div class="form-group">
            <label for="biografia">Biografía:</label>
            <textarea name="biografia" id="biografia" class="form-control" required>{{ $candidato->biografia }}</textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado:</label>
            <input type="text" name="estado" id="estado" class="form-control" value="{{ $candidato->estado }}" required>
        </div>

        <div class="form-group">
            <label for="eleccion_id">Elección:</label>
            <select name="eleccion_id" id="eleccion_id" class="form-control" required>
                @foreach ($elecciones as $eleccion)
                    <option value="{{ $eleccion->id }}" {{ $eleccion->id == $candidato->eleccion_id ? 'selected' : '' }}>{{ $eleccion->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="number" name="edad" id="edad" class="form-control" value="{{ $candidato->edad }}" required>
        </div>

        <div class="form-group">
            <label for="posicion">Posición:</label>
            <input type="text" name="posicion" id="posicion" class="form-control" value="{{ $candidato->eleccion->posicion }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('candidatos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
