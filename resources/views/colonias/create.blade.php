@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Colonia</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('colonias.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="distrito_id">Distrito:</label>
                                <select name="distrito_id" id="distrito_id" class="form-control" required>
                                    <option value="">Seleccionar distrito</option>
                                    @foreach($distritos as $distrito)
                                        <option value="{{ $distrito->id }}">{{ $distrito->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">Líder:</label>
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">Seleccionar líder</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Crear</button>
                                <a href="{{ route('colonias.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
