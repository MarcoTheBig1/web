@extends('layouts.app')

@section('content')
    <h1>Candidatos</h1>

    <a href="{{ route('candidatos.create') }}" class="btn btn-primary">Agregar Candidato</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Partido Político</th>
                <th>Foto</th>
                <th>Biografía</th>
                <th>Estado</th>
                <th>Elección</th>
                <th>Edad</th>
                <th>Posición</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($candidatos as $candidato)
                <tr>
                    <td>{{ $candidato->id }}</td>
                    <td>{{ $candidato->nombre }}</td>
                    <td>{{ $candidato->apellido_paterno }}</td>
                    <td>{{ $candidato->apellido_materno }}</td>
                    <td>{{ $candidato->email }}</td>
                    <td>{{ $candidato->telefono }}</td>
                    <td>{{ $candidato->partido_politico }}</td>
                    <td>
                        @if ($candidato->foto)
                            <img src="{{ asset('storage/fotos/'.$candidato->foto) }}" alt="{{ $candidato->nombre }}" style="width: 100px;">
                        @endif
                    </td>
                    <td>{{ $candidato->biografia }}</td>
                    <td>{{ $candidato->estado }}</td>
                    <td>{{ $candidato->eleccion->nombre }}</td>
                    <td>{{ $candidato->edad }}</td>
                    <td>{{ $candidato->eleccion->posicion }}</td>
                    <td>
                        <a href="{{ route('candidatos.show', $candidato->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('candidatos.edit', $candidato->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('candidatos.destroy', $candidato->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
