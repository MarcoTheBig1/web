@extends('layouts.app')

@section('content')
    <h1>Detalles del Candidato</h1>

    <table class="table">
        <tr>
            <th>ID:</th>
            <td>{{ $candidato->id }}</td>
        </tr>
        <tr>
            <th>Nombre:</th>
            <td>{{ $candidato->nombre }}</td>
        </tr>
        <tr>
            <th>Apellido Paterno:</th>
            <td>{{ $candidato->apellido_paterno }}</td>
        </tr>
        <tr>
            <th>Apellido Materno:</th>
            <td>{{ $candidato->apellido_materno }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $candidato->email }}</td>
        </tr>
        <tr>
            <th>Teléfono:</th>
            <td>{{ $candidato->telefono }}</td>
        </tr>
        <tr>
            <th>Partido Político:</th>
            <td>{{ $candidato->partido_politico }}</td>
        </tr>
        <tr>
            <th>Foto:</th>
            <td>
                @if ($candidato->foto)
                    <img src="{{ asset('storage/fotos/' . $candidato->foto) }}" alt="{{ $candidato->nombre }}" style="width: 100px;">
                @else
                    No hay foto disponible
                @endif
            </td>
        </tr>
        <tr>
            <th>Biografía:</th>
            <td>{{ $candidato->biografia }}</td>
        </tr>
        <tr>
            <th>Estado:</th>
            <td>{{ $candidato->estado }}</td>
        </tr>
        <tr>
            <th>Elección:</th>
            <td>{{ $candidato->eleccion->nombre }}</td>
        </tr>
        <tr>
            <th>Edad:</th>
            <td>{{ $candidato->edad }}</td>
        </tr>
        <tr>
            <th>Posición:</th>
            <td>{{ $candidato->eleccion->posicion }}</td>
        </tr>
    </table>

    <a href="{{ route('candidatos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
