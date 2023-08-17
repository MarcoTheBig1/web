@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Registro de Estado de Simpatía</h1>

        <form action="{{ route('historialestadossimpatia.store') }}" method="POST">
            @csrf

            <!-- Campos del formulario -->
            <div class="form-group">
                <label for="persona_id">Persona:</label>
                <select name="persona_id" id="persona_id" class="form-control">
                    @foreach ($personas as $persona)
                        <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="estado_simpatia_id">Estado de Simpatía:</label>
                <select name="estado_simpatia_id" id="estado_simpatia_id" class="form-control">
                    @foreach ($estadosSimpatia as $estadoSimpatia)
                        <option value="{{ $estadoSimpatia->id }}">{{ $estadoSimpatia->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
