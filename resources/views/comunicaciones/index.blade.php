@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Communications</h1>
        <a href="{{ route('comunicaciones.create') }}" class="btn btn-primary mb-3">Create Communication</a>
        <table class="table">
            @if (count($comunicaciones) > 0)
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Persona</th>
                        <th>User</th>
                        <th>Type</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comunicaciones as $comunicacion)
                        <tr>
                            <td>{{ $comunicacion->id }}</td>
                            <td>{{ $comunicacion->persona->nombre }}</td>
                            <td>{{ $comunicacion->user->name }}</td>
                            <td>{{ $comunicacion->tipoComunicacion->nombre }}</td>
                            <td>{{ $comunicacion->contenido }}</td>
                            <td>{{ $comunicacion->fecha }}</td>
                            <td>
                                <a href="{{ route('comunicaciones.show', $comunicacion->id) }}" class="btn btn-primary">View</a>
                                <a href="{{ route('comunicaciones.edit', $comunicacion->id) }}" class="btn btn-secondary">Edit</a>
                                <form action="{{ route('comunicaciones.destroy', $comunicacion->id) }}" method="POST" style="display: inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @else
                <p>No communications found.</p>
            @endif
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
