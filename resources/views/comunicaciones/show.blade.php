@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Communication Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $comunicacion->id }}</td>
                </tr>
                <tr>
                    <th>Persona</th>
                    <td>{{ $comunicacion->persona->nombre }}</td>
                </tr>
                <tr>
                    <th>User</th>
                    <td>{{ $comunicacion->user->name }}</td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{ $comunicacion->tipo }}</td>
                </tr>
                <tr>
                    <th>Content</th>
                    <td>{{ $comunicacion->contenido }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ $comunicacion->fecha }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('comunicaciones.index') }}" class="btn btn-primary">Back to Communications</a>
    </div>
@endsection
