@extends('layouts.app')

@section('content')
    <h1>Editar Distrito</h1>
    <form action="{{ route('distritos.update', $distrito->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $distrito->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="sector_id">Sector:</label>
            <select class="form-control" id="sector_id" name="sector_id" required>
                <option value="">Seleccione un sector</option>
                @foreach($sectores as $sector)
                    <option value="{{ $sector->id }}" {{ $distrito->sector_id == $sector->id ? 'selected' : '' }}>
                        {{ $sector->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('distritos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
