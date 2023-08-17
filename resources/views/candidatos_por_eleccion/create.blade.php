@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Candidato por Elección</h1>
        <form action="{{ route('candidatos_por_eleccion.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="candidato_id">Candidato:</label>
                <select name="candidato_id" id="candidato_id" class="form-control">
                    {{-- Recorre la lista de candidatos y muestra las opciones --}}
                    @foreach($candidatos as $candidato)
                        <option value="{{ $candidato->id }}">{{ $candidato->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="eleccion_id">Elección:</label>
                <select name="eleccion_id" id="eleccion_id" class="form-control">
                    {{-- Recorre la lista de elecciones y muestra las opciones --}}
                    @foreach($elecciones as $eleccion)
                        <option value="{{ $eleccion->id }}">{{ $eleccion->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <input type="text" name="posicion" id="posicion" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
