@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de Opción de Respuesta</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>ID:</th>
                <td>{{ $opcionRespuesta->id }}</td>
            </tr>
            <tr>
                <th>Cuestionario:</th>
                <td>{{ $opcionRespuesta->pregunta->cuestionario->nombre_cuestionario }}</td>
            </tr>
            <tr>
                <th>Pregunta:</th>
                <td>{{ $opcionRespuesta->pregunta->Pregunta }}</td>
            </tr>
            <tr>
                <th>Tipo de Pregunta:</th>
                <td>{{ $opcionRespuesta->pregunta->tipoPregunta->nombre }}</td>
            </tr>
            <tr>
                <th>Contenido:</th>
                <td>{{ $opcionRespuesta->contenido }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('opcionesrespuestas.index') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
