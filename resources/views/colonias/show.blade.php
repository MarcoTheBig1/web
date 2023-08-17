@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Colonia</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $colonia->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $colonia->nombre }}</td>
                </tr>
                <tr>
                    <th>Distrito</th>
                    <td>{{ $colonia->distrito->nombre }}</td>
                </tr>
                <tr>
                    <th>Líder</th>
                    <td>{{ $colonia->user->name }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('colonias.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection
