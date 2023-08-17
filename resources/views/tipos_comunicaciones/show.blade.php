@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Tipo de Comunicación</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Nombre: {{ $tipoComunicacion->nombre }}</h5>
                <p class="card-text">ID: {{ $tipoComunicacion->id }}</p>
                <a href="{{ route('tipos_comunicaciones.edit', $tipoComunicacion->id) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('tipos_comunicaciones.destroy', $tipoComunicacion->id) }}" method="POST" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
