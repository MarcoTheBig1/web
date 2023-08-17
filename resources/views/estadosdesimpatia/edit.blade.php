@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Estado de Simpatía</h1>
        <form action="{{ route('estadosdesimpatia.update', $estadoDeSimpatia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" name="estado" id="estado" class="form-control" value="{{ $estadoDeSimpatia->estado }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
