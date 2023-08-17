@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Estados de Simpatía</h1>
        <a href="{{ route('estadosdesimpatia.create') }}" class="btn btn-primary">Crear Estado de Simpatía</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($estadosDeSimpatia as $estadoDeSimpatia)
                    <tr>
                        <td>{{ $estadoDeSimpatia->id }}</td>
                        <td>{{ $estadoDeSimpatia->estado }}</td>
                        <td>
                            <a href="{{ route('estadosdesimpatia.show', $estadoDeSimpatia->id) }}" class="btn btn-primary btn-sm">Ver</a>
                            <a href="{{ route('estadosdesimpatia.edit', $estadoDeSimpatia->id) }}" class="btn btn-success btn-sm">Editar</a>
                            <form action="{{ route('estadosdesimpatia.destroy', $estadoDeSimpatia->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este estado de simpatía?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">No se encontraron estados de simpatía.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
