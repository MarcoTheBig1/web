@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Usuario</h1>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno:</label>
            <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control" value="{{ $user->apellido_paterno }}" required>
        </div>

        <div class="form-group">
            <label for="apellido_materno">Apellido Materno:</label>
            <input type="text" name="apellido_materno" id="apellido_materno" class="form-control" value="{{ $user->apellido_materno }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $user->telefono }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="roles">Roles:</label>
            <br>
            @foreach($roles as $role)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="role_{{ $role->id }}" name="roles[]" value="{{ $role->id }}" @if($user->roles->contains($role->id)) checked @endif>
                <label class="form-check-label" for="role_{{ $role->id }}">{{ $role->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" minlength="6">
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('users.show', $user->id) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection