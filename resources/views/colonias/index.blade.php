@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Colonias</h1>
        <a href="{{ route('colonias.create') }}" class="btn btn-primary mb-3">Crear Colonia</a>
        @if (count($colonias) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Distrito</th>
                        <th>Líder</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($colonias as $colonia)
                        <tr>
                            <td>{{ $colonia->id }}</td>
                            <td>{{ $colonia->nombre }}</td>
                            <td>{{ $colonia->distrito->nombre }}</td>
                            <td>{{ $colonia->user->name }}</td>
                            <td>
                                <a href="{{ route('colonias.show', $colonia->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('colonias.edit', $colonia->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                <form action="{{ route('colonias.destroy', $colonia->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta colonia?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No se encontraron colonias.</p>
        @endif
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
