@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalle del Registro de Estado de Simpatía</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $historial->id }}</h5>
                <p class="card-text"><strong>Persona:</strong> {{ $historial->persona->nombre }}</p>
                <p class="card-text"><strong>Estado de Simpatía:</strong> {{ $historial->estadoSimpatia->nombre }}</p>
                <p class="card-text"><strong>Fecha:</strong> {{ $historial->fecha }}</p>
            </div>
        </div>
    </div>
@endsection
