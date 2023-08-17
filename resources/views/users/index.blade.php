@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Usuarios</h1>

    <a href="{{ route('users.create') }}" class="btn btn-primary">Registrar Usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apelllido Paterno</th>
                <th>Apelllido Materno</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->apellido_paterno }}</td>
                <td>{{ $user->apellido_materno }}</td>
                <td>{{ $user->telefono }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->roles->count() > 0)
                    @foreach ($user->roles as $role)
                    <span class="custom-badge custom-badge-assigned">{{ $role->name }}</span>
                    @endforeach
                    @else
                    <span class="custom-badge custom-badge-unassigned">{{ __('No Role') }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">Ver</a>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection