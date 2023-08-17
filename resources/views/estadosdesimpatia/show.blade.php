@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Estado de Simpatía</h1>
        <table class="table mt-3">
            <tbody>
                <tr>
                    <th>ID:</th>
                    <td>{{ $estadoDeSimpatia->id }}</td>
                </tr>
                <tr>
                    <th>Estado:</th>
                    <td>{{ $estadoDeSimpatia->estado }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('estadosdesimpatia.index') }}" class="btn btn-primary">Volver</a>
        <form action="{{ route('estadosdesimpatia.destroy', $estadoDeSimpatia->id) }}" method="POST" class="d-inline">
            @csrf
        </form>
    </div>
@endsection
