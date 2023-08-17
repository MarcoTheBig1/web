@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tipos de Comunicación</h1>

        <a href="{{ route('tipos_comunicaciones.create') }}" class="btn btn-primary">Agregar Tipo de Comunicación</a>

        @if (session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposComunicacion as $tipoComunicacion)
                    <tr>
                        <td>{{ $tipoComunicacion->id }}</td>
                        <td>{{ $tipoComunicacion->nombre }}</td>
                        <td>
                            <a href="{{ route('tipos_comunicaciones.edit', $tipoComunicacion->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('tipos_comunicaciones.destroy', $tipoComunicacion->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este tipo de comunicación?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
