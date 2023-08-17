@extends('layouts.app')

@section('content')
    <h1>Editar Simpatizante</h1>

    <form action="{{ route('simpatizantes.update', $simpatizante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $simpatizante->nombre }}">
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control" value="{{ $simpatizante->apellido }}">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $simpatizante->telefono }}">
        </div>

        <div class="form-group">
            <label for="distrito_id">Distrito</label>
            <select name="distrito_id" id="distrito_id" class="form-control">
                @foreach($distritos as $distrito)
                    <option value="{{ $distrito->id }}" {{ $simpatizante->distrito_id == $distrito->id ? 'selected' : '' }}>{{ $distrito->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
