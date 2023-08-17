@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Preguntas del Cuestionario: {{ $cuestionario->nombre_cuestionario }}</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pregunta</th>
                <th>Tipo de Pregunta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preguntas as $pregunta)
            <tr>
                <td>{{ $pregunta->idPregunta }}</td>
                <td>{{ $pregunta->Pregunta }}</td>
                <td>{{ $pregunta->tipoPregunta->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('cuestionarios.index') }}" class="btn btn-secondary mb-3">Regresar</a>
</div>
@endsection
