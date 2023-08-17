@extends('layouts.app')

@section('content')
    <h1>Crear Simpatizante</h1>

    <form action="{{ route('simpatizantes.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
        </div>

        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" class="form-control">
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" name="telefono" id="telefono" class="form-control">
        </div>

        <div class="form-group">
            <label for="distrito_id">Distrito</label>
            <select name="distrito_id" id="distrito_id" class="form-control">
                @foreach($distritos as $distrito)
                    <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection

