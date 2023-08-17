@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Sector</h1>
        <form action="{{ route('sectores.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
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
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
@endsection
