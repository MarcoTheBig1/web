@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Persona</h1>
        <table class="table mt-3">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $persona->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $persona->nombre }}</td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td>{{ $persona->apellido }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $persona->email }}</td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td>{{ $persona->telefono }}</td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td>{{ $persona->direccion }}</td>
                </tr>
                <tr>
                    <th>Colonia</th>
                    <td>{{ $persona->colonia ? $persona->colonia->nombre : 'N/A' }}</td>
                </tr>
                <tr>
                    <th>Estado de Simpatía</th>
                    <td>{{ $persona->estado ? $persona->estado->estado : 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('personas.edit', $persona->id) }}" class="btn btn-success">Editar</a>
        <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta persona?')">Eliminar</button>
        </form>
        <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
