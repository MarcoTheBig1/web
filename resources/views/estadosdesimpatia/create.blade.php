@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Estado de Simpatía</h1>
        <form action="{{ route('estadosdesimpatia.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
