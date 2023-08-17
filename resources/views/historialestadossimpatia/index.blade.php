@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Registros de Estados de Simpatía</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Persona</th>
                    <th>Estado de Simpatía</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($historiales as $historial)
                    <tr>
                        <td>{{ $historial->id }}</td>
                        <td>{{ $historial->persona->nombre }}</td>
                        <td>{{ $historial->estadoSimpatia->nombre }}</td>
                        <td>{{ $historial->fecha }}</td>
                        <td>
                            <a href="{{ route('historial_estado_simpatia.show', $historial->id) }}"
                                class="btn btn-primary">Ver</a>
                            <a href="{{ route('historial_estado_simpatia.edit', $historial->id) }}"
                                class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
