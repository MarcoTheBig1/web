@extends('layouts.app')

@section('content')
    <h1>Detalles del Simpatizante</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $simpatizante->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $simpatizante->nombre }}</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>{{ $simpatizante->apellido }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $simpatizante->telefono }}</td>
            </tr>
            <tr>
                <th>Distrito</th>
                <td>{{ $simpatizante->distrito->nombre }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('simpatizantes.edit', $simpatizante->id) }}" class="btn btn-success">Editar</a>
@endsection
