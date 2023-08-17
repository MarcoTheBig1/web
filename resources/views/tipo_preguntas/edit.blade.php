@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Tipo de Pregunta</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tipo_preguntas.update', $tipoPregunta->idTipoPregunta) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $tipoPregunta->nombre }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('tipo_preguntas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
