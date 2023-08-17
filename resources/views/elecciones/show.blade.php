@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Eleccion</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $eleccion->nombre }}</h5>
                <p class="card-text"><strong>Descripción:</strong> {{ $eleccion->descripcion }}</p>
                <p class="card-text"><strong>Fecha de Inicio:</strong> {{ $eleccion->fecha_inicio }}</p>
                <p class="card-text"><strong>Fecha de Fin:</strong> {{ $eleccion->fecha_fin }}</p>
                <p class="card-text"><strong>Estado:</strong> {{ $eleccion->estado }}</p>
                <p class="card-text"><strong>Posición:</strong> {{ $eleccion->posicion }}</p>
                <a href="{{ route('elecciones.edit', $eleccion->id) }}" class="btn btn-primary">Editar</a>
            </div>
        </div>
    </div>
@endsection
