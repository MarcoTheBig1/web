@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Candidatos por Elección</h1>
        <a href="{{ route('candidatosporeleccion.create') }}" class="btn btn-primary mb-3">Agregar Candidato por Elección</a>
        <table class="table">
            @if (count($candidatosPorEleccion) > 0)
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Candidato</th>
                        <th>Elección</th>
                        <th>Posición</th> <!-- Agregamos la columna para mostrar la posición -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatosPorEleccion as $candidatoPorEleccion)
                        <tr>
                            <td>{{ $candidatoPorEleccion->id }}</td>
                            <td>{{ $candidatoPorEleccion->candidato->nombre }}</td>
                            <td>{{ $candidatoPorEleccion->eleccion->nombre }}</td>
                            <td>{{ $candidatoPorEleccion->posicion }}</td> <!-- Mostramos la posición del candidato -->
                            <td>
                                <a href="{{ route('candidatos_por_eleccion.show', $candidatoPorEleccion->id) }}" class="btn btn-primary">Ver</a>
                                <a href="{{ route('candidatos_por_eleccion.edit', $candidatoPorEleccion->id) }}" class="btn btn-secondary">Editar</a>
                                <form action="{{ route('candidatos_por_eleccion.destroy', $candidatoPorEleccion->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p>No se encontraron candidatos por elección.</p>
            @endif
        </table>
    </div>
@endsection
