@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Sectores</h1>
        <a href="{{ route('sectores.create') }}" class="btn btn-success">Crear Sector</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Líder</th>
                    <th>Creado en</th>
                    <th>Actualizado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sectores as $sector)
                    <tr>
                        <td>{{ $sector->id }}</td>
                        <td>{{ $sector->nombre }}</td>
                        <td>{{ optional($sector->user)->name }}</td>
                        <td>{{ $sector->created_at }}</td>
                        <td>{{ $sector->updated_at }}</td>
                        <td>
                            <a href="{{ route('sectores.show', $sector->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('sectores.edit', $sector->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('sectores.destroy', $sector->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
