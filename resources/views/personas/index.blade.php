@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Personas</h1>
    <a href="{{ route('personas.create') }}" class="btn btn-primary">Crear Persona</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Colonia</th>
                <th>Estado de Simpatía</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($personas as $persona)
            <tr>
                <td>{{ $persona->id }}</td>
                <td>{{ $persona->nombre }}</td>
                <td>{{ $persona->apellido }}</td>
                <td>{{ $persona->email }}</td>
                <td>{{ $persona->telefono }}</td>
                <td>{{ $persona->direccion }}</td>
                <td>{{ $persona->colonia ? $persona->colonia->nombre : 'N/A' }}</td>
                <td>{{ $persona->estadoSimpatia ? $persona->estadoSimpatia->estado : 'N/A' }}</td>
                <td>
                    <a href="{{ route('personas.show', $persona->id) }}" class="btn btn-primary btn-sm">Ver</a>
                    <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-success btn-sm">Editar</a>
                    <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">No se encontraron personas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection