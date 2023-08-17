@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $sector->nombre }}</h1>
        <p>Líder: {{ $sector->lider->nombre }} {{ $sector->lider->apellido }}</p>
        <p>ID: {{ $sector->id }}</p>
        <p>Creado en: {{ $sector->created_at }}</p>
        <p>Actualizado en: {{ $sector->updated_at }}</p>
        <a href="{{ route('sectores.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
