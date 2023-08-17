@extends('layouts.app')

@section('content')
    <h1>Simpatizantes</h1>

    <a href="{{ route('simpatizantes.create') }}" class="btn btn-primary mb-3">Crear Simpatizante</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Teléfono</th>
                <th>Distrito</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($simpatizantes as $simpatizante)
                <tr>
                    <td>{{ $simpatizante->id }}</td>
                    <td>{{ $simpatizante->nombre }}</td>
                    <td>{{ $simpatizante->apellido }}</td>
                    <td>{{ $simpatizante->telefono }}</td>
                    <td>{{ $simpatizante->distrito->nombre }}</td>
                    <td>
                        <a href="{{ route('simpatizantes.show', $simpatizante->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('simpatizantes.edit', $simpatizante->id) }}" class="btn btn-success btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
