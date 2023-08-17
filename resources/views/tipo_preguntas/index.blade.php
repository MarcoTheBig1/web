@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tipos de Preguntas</h1>

        <a href="{{ route('tipo_preguntas.create') }}" class="btn btn-primary">Agregar Tipo de Pregunta</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tipoPreguntas as $tipoPregunta)
                    <tr>
                        <td>{{ $tipoPregunta->idTipoPregunta }}</td>
                        <td>{{ $tipoPregunta->nombre }}</td>
                        <td>
                            <a href="{{ route('tipo_preguntas.edit', $tipoPregunta->idTipoPregunta) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('tipo_preguntas.destroy', $tipoPregunta->idTipoPregunta) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de pregunta?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
