@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Distritos</h1>
        <a href="{{ route('distritos.create') }}" class="btn btn-success">Crear Distrito</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Sector</th>
                    <th>Creado en</th>
                    <th>Actualizado en</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($distritos as $distrito)
                    <tr>
                        <td>{{ $distrito->id }}</td>
                        <td>{{ $distrito->nombre }}</td>
                        <td>{{ $distrito->sector->nombre }}</td>
                        <td>{{ $distrito->created_at }}</td>
                        <td>{{ $distrito->updated_at }}</td>
                        <td>
                            <a href="{{ route('distritos.show', $distrito->id) }}" class="btn btn-primary">Ver</a>
                            <a href="{{ route('distritos.edit', $distrito->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('distritos.destroy', $distrito->id) }}" method="POST" style="display: inline-block;">
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
