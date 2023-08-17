@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Respuestas OM</h1>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('respuestas_om.create') }}" class="btn btn-primary mt-3">Agregar Respuesta OM</a>

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Pregunta</th>
                    <th>Respuesta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($respuestasOM as $respuestaOM)
                    <tr>
                        <td>{{ $respuestaOM->idOM }}</td>
                        <td>{{ $respuestaOM->pregunta->Pregunta }}</td>
                        <td>{{ $respuestaOM->Respuesta }}</td>
                        <td>
                            <a href="{{ route('respuestas_om.edit', $respuestaOM->idOM) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('respuestas_om.destroy', $respuestaOM->idOM) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta respuesta?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
