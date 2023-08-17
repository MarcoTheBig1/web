@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rol: {{ $role->name }}</h1>

        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $role->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $role->name }}</td>
                </tr>
                <tr>
                    <th>Permisos</th>
                    <td>
                        @if ($role->permissions->count() > 0)
                            @foreach ($role->permissions as $permission)
                                <span class="badge badge-primary custom">{{ $permission->name }}</span>
                            @endforeach
                        @else
                            <span class="badge badge-secondary">Sin permisos asignados</span>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
