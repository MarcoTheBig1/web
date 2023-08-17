@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Opciones de Respuesta</h1>
    <a href="{{ route('opcionesrespuestas.create') }}" class="btn btn-primary mb-3">Crear Opción de Respuesta</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cuestionario</th>
                <th>Pregunta</th>
                <th>Tipo de Pregunta</th>
                <th>Contenido</th>
                
                <th>Acciones</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($opcionRespuestas as $opcionRespuesta)
                <tr>
                    <td>{{ $opcionRespuesta->id }}</td>
                    <td>{{ $opcionRespuesta->pregunta->cuestionario->nombre_cuestionario }}</td>
                    <td>{{ $opcionRespuesta->pregunta->Pregunta }}</td>
                    <td>{{ $opcionRespuesta->pregunta->tipoPregunta->nombre }}</td>
                    <td>{{ $opcionRespuesta->contenido }}</td>
                    <td>
                        <a href="{{ route('opcionesrespuestas.show', $opcionRespuesta->id) }}" class="btn btn-primary">Ver</a>
                        <a href="{{ route('opcionesrespuestas.edit', $opcionRespuesta->id) }}" class="btn btn-secondary">Editar</a>
                        <form action="{{ route('opcionesrespuestas.destroy', $opcionRespuesta->id) }}" method="POST" style="display: inline;">
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
</div>
@endsection
