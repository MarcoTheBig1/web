@extends('layouts.app')

@section('content')
<h1>Cuestionarios</h1>

<a href="{{ route('cuestionarios.create') }}" class="btn btn-primary">Crear Cuestionario</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fecha de creación</th>
            <th>Nombre del cuestionario</th>
            <th>Descripción del cuestionario</th>
            <th>Estatus</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cuestionarios as $cuestionario)
        <tr>
            <td>{{ $cuestionario->idCuestionario }}</td>
            <td>{{ $cuestionario->fecha_creacion }}</td>
            <td>{{ $cuestionario->nombre_cuestionario }}</td>
            <td>{{ $cuestionario->descripcion_cuestionario }}</td>
            <td>{{ $cuestionario->estatus ? 'Activo' : 'Inactivo' }}</td>
            <td>
                @if ($cuestionario->estatus)
                <a href="{{ route('preguntas.create', ['idCuestionario' => $cuestionario->idCuestionario, 'nombreCuestionario' => $cuestionario->nombre_cuestionario]) }}" class="btn btn-primary">Agregar Pregunta</a>

                <a href="{{ route('cuestionarios.verPreguntas', $cuestionario->idCuestionario) }}" class="btn btn-primary">Ver Preguntas</a>
                @else
                <span class="text-muted">Cuestionario inactivo</span>
                @endif
                <a href="{{ route('cuestionarios.show', $cuestionario->idCuestionario) }}" class="btn btn-info">Ver</a>
                <a href="{{ route('cuestionarios.edit', $cuestionario->idCuestionario) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('cuestionarios.destroy', $cuestionario->idCuestionario) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
<a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
@endsection