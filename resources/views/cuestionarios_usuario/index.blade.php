@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cuestionarios Disponibles</h1>

    <div class="row">
    @foreach ($cuestionarios as $cuestionario)
    <div class="col-md-4 mt-4">
        <div class="card">
            <a href="{{ route('ruta.preguntas', ['idCuestionario' => $cuestionario->idCuestionario]) }}" class="custom">
                <div class="card-body">
                    <h5 class="card-title">{{ $cuestionario->nombre_cuestionario }}</h5>
                    <p class="card-text"><strong>Descripción del cuestionario:</strong> {{ $cuestionario->descripcion_cuestionario }}</p>
                    <p class="card-text"><strong>Fecha de alta:</strong> {{ $cuestionario->created_at }}</p>
                    <p class="card-text"><strong>Fecha de inicio:</strong> {{ $cuestionario->fecha_inicio }}</p>
                    <p class="card-text"><strong>Fecha de fin:</strong> {{ $cuestionario->fecha_fin }}</p>
                </div>
            </a>
        </div>
    </div>
    @endforeach
</div>

<a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
</div>
@endsection
