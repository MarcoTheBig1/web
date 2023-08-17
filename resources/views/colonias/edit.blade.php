@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Colonia</h1>
        <form action="{{ route('colonias.update', $colonia->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $colonia->nombre }}">
            </div>
            <div class="form-group">
                <label for="distrito_id">Distrito:</label>
                <select name="distrito_id" id="distrito_id" class="form-control">
                    @foreach($distritos as $distrito)
                        <option value="{{ $distrito->id }}" {{ $colonia->distrito_id == $distrito->id ? 'selected' : '' }}>
                            {{ $distrito->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="user_id">Líder:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $colonia->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('colonias.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
