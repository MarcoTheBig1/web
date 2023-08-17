@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Comunicación</h1>
        <form action="{{ route('comunicaciones.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="persona_id">Persona:</label>
                <select name="persona_id" id="persona_id" class="form-control">
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="users_id">Usuarios:</label>
                <select name="users_id" id="users_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_id">Tipo (Email, Llamada telefónica, Mensaje, etc.):</label>
                <input type="text" name="tipo_id" id="tipo_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="contenido">Contenido:</label>
                <textarea name="contenido" id="contenido" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
