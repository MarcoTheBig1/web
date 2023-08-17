@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Rol</h1>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}" required>
            </div>

            <div class="form-group">
                <label for="permission">Permisos</label>
                <div class="checkbox-group">
                    @foreach ($permissions as $permission)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                    {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                {{ $permission->description }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection