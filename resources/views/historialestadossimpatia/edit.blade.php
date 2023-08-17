@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Registro de Estado de Simpatía</h1>

        <form action="{{ route('historialestadossimpatia.update', $historial->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="persona_id">Persona:</label>
                <select name="persona_id" id="persona_id" class="form-control">
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}"
                            {{ $persona->id == $historial->persona_id ? 'selected' : '' }}>
                            {{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado_simpatia_id">Estado de Simpatía:</label>
                <select name="estado_simpatia_id" id="estado_simpatia_id" class="form-control">
                    @foreach ($estadosSimpatia as $estadoSimpatia)
                        <option value="{{ $estadoSimpatia->id }}"
                            {{ $estadoSimpatia->id == $historial->estado_simpatia_id ? 'selected' : '' }}>
                            {{ $estadoSimpatia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="{{ $historial->fecha }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
