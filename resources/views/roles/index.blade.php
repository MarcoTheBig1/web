@extends('layouts.app')

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            {{ session['info'] }}
        </div>
    @endif
    
    <div class="container">
        <h1>Roles</h1>

        <a href="{{ route('roles.create') }}" class="btn btn-primary mb-3">Crear Rol</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection