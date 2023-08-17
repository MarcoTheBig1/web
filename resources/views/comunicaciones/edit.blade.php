@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Communication</h1>
        <form action="{{ route('comunicaciones.update', $comunicacion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="persona_id">Persona:</label>
                <select name="persona_id" id="persona_id" class="form-control">
                    @foreach($personas as $persona)
                        <option value="{{ $persona->id }}" @if($persona->id === $comunicacion->persona_id) selected @endif>{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="users_id">User:</label>
                <select name="users_id" id="users_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($user->id === $comunicacion->users_id) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Type (Email, Phone Call, Message, etc.):</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $comunicacion->tipo }}" required>
            </div>
            <div class="form-group">
                <label for="contenido">Content:</label>
                <textarea name="contenido" id="contenido" class="form-control" required>{{ $comunicacion->contenido }}</textarea>
            </div>
            <div class="form-group">
                <label for="fecha">Date:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $comunicacion->fecha }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
