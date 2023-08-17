@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Preguntas</h1>

    <a href="{{ route('preguntas.create') }}" class="btn btn-primary">Agregar Pregunta</a>

    @if (session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cuestionario</th>
                <th>Pregunta</th>
                <th>Tipo Pregunta</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $pregunta)
            <tr>
                <td>{{ $pregunta->idPregunta }}</td>
                <td>{{ $pregunta->cuestionario->nombre_cuestionario }}</td>
                <td>{{ $pregunta->Pregunta }}</td>
                <td>{{ $pregunta->tipoPregunta->nombre }}</td>
                <td>
                    <a href="{{ route('preguntas.edit', $pregunta->idPregunta) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('preguntas.destroy', $pregunta->idPregunta) }}" method="POST" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta pregunta?')">Eliminar</button>
                    </form>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('cuestionarios.index') }}" class="btn btn-secondary">Regresar a Cuestionarios</a>

</div>
@endsection