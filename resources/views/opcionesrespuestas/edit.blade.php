@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Opción de Respuesta</h1>
    <form action="{{ route('opcionesrespuestas.update', $opcionRespuesta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="pregunta_id">Pregunta:</label>
            <select class="form-control" id="pregunta_id" name="pregunta_id" disabled>
                <option value="{{ $opcionRespuesta->pregunta_id }}">{{ $opcionRespuesta->pregunta->Pregunta }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="contenido">Contenido:</label>
            <input type="text" class="form-control" id="contenido" name="contenido" value="{{ $opcionRespuesta->contenido }}" disabled>
        </div>

        <a href="{{ route('opcionesrespuestas.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection
