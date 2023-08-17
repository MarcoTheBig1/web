@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Distrito</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">ID: {{ $distrito->id }}</h5>
                <p class="card-text"><strong>Nombre:</strong> {{ $distrito->nombre }}</p>
                <p class="card-text"><strong>Sector:</strong> {{ $distrito->sector->nombre }}</p>
                <p class="card-text"><strong>Creado en:</strong> {{ $distrito->created_at }}</p>
                <p class="card-text"><strong>Actualizado en:</strong> {{ $distrito->updated_at }}</p>
                <a href="{{ route('distritos.index') }}" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
@endsection
