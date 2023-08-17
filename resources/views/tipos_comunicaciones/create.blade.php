@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Agregar Tipo de Comunicación</h1>

        @if ($errors->any())
            <div class="alert alert-danger mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('tipos_comunicaciones.store') }}" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('tipos_comunicaciones.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
