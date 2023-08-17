@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Cuestionario</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $cuestionario->idCuestionario }}</h5>
                <p class="card-text">Fecha de creación: {{ $cuestionario->fecha_creacion }}</p>
                <p class="card-text">Nombre del cuestionario: {{ $cuestionario->nombre_cuestionario }}</p>
                <p class="card-text">Descripción del cuestionario: {{ $cuestionario->descripcion_cuestionario }}</p>
                <p class="card-text">Estatus: {{ $cuestionario->Estatus ? 'Activo' : 'Inactivo' }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('cuestionarios.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
@endsection
