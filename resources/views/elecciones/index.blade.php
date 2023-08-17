@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Elecciones</h1>
        <a href="{{ route('elecciones.create') }}" class="btn btn-primary">Crear Eleccion</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Posición</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($elecciones as $eleccion)
                    <tr>
                        <td>{{ $eleccion->nombre }}</td>
                        <td>{{ $eleccion->descripcion }}</td>
                        <td>{{ $eleccion->fecha_inicio }}</td>
                        <td>{{ $eleccion->fecha_fin }}</td>
                        <td>{{ $eleccion->estado }}</td>
                        <td>{{ $eleccion->posicion }}</td>
                        <td>
                            <a href="{{ route('elecciones.show', $eleccion->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('elecciones.edit', $eleccion->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('elecciones.destroy', $eleccion->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
