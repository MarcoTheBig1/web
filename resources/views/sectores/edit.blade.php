@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Sector</h1>
        <form action="{{ route('sectores.update', $sector->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $sector->nombre }}">
            </div>
            <div class="form-group">
                <label for="user_id">Líder:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Seleccione un líder</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('sectores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
