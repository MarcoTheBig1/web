@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Distrito</h1>
        <form action="{{ route('distritos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sector_id">Sector:</label>
                <select name="sector_id" id="sector_id" class="form-control" required>
                    <option value="">Seleccione un sector</option>
                    @foreach ($sectores as $sector)
                        <option value="{{ $sector->id }}">{{ $sector->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="{{ route('distritos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
