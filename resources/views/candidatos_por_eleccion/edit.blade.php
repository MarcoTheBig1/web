@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Candidato por Elección</h1>
        <form action="{{ route('candidatos_por_eleccion.update', $candidatoPorEleccion->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="candidato_id">Candidato:</label>
                <select name="candidato_id" id="candidato_id" class="form-control">
                    {{-- Recorre la lista de candidatos y muestra las opciones --}}
                    @foreach($candidatos as $candidato)
                        <option value="{{ $candidato->id }}" @if($candidato->id === $candidatoPorEleccion->candidato_id) selected @endif>{{ $candidato->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="eleccion_id">Elección:</label>
                <select name="eleccion_id" id="eleccion_id" class="form-control">
                    {{-- Recorre la lista de elecciones y muestra las opciones --}}
                    @foreach($elecciones as $eleccion)
                        <option value="{{ $eleccion->id }}" @if($eleccion->id === $candidatoPorEleccion->eleccion_id) selected @endif>{{ $eleccion->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="posicion">Posición:</label>
                <input type="text" name="posicion" id="posicion" class="form-control" value="{{ $candidatoPorEleccion->posicion }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
