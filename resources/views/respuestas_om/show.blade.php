@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Respuesta OM</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $respuestaOM->idOM }}</h5>
                <p class="card-text">Pregunta: {{ $respuestaOM->pregunta->Pregunta }}</p>
                <p class="card-text">Respuesta: {{ $respuestaOM->Respuesta }}</p>
                <a href="{{ route('respuestas_om.edit', $respuestaOM->idOM) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('respuestas_om.destroy', $respuestaOM->idOM) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
