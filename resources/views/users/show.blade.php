@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Usuario</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>apellido_paterno</th>
                    <td>{{ $user->apellido_paterno }}</td>
                </tr>
                <tr>
                    <th>apellido_materno</th>
                    <td>{{ $user->apellido_materno }}</td>
                </tr>
                <tr>
                    <th>telefono</th>
                    <td>{{ $user->telefono }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Volver</a>
    </div>
@endsection
