@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Candidato por Elección</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $candidatoPorEleccion->id }}</td>
                </tr>
                <tr>
                    <th>Candidato</th>
                    <td>{{ $candidatoPorEleccion->candidato->nombre }}</td>
                </tr>
                <tr>
                    <th>Elección</th>
                    <td>{{ $candidatoPorEleccion->eleccion->nombre }}</td>
                </tr>
                <tr>
                    <th>Posición</th>
                    <td>{{ $candidatoPorEleccion->posicion }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
