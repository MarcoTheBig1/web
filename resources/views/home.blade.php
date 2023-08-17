@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #007BFF; color: white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="btn-group-vertical w-100">
                                <a href="{{ route('roles.index') }}" class="btn btn-primary btn-block mb-3">Roles</a>
                                <a href="{{ route('users.index') }}" class="btn btn-primary btn-block mb-3">Usuarios</a>
                                <a href="{{ route('sectores.index') }}" class="btn btn-primary btn-block mb-3">Sectores</a>
                                <a href="{{ route('distritos.index') }}" class="btn btn-primary btn-block mb-3">Distritos</a>
                                <a href="{{ route('colonias.index') }}" class="btn btn-primary btn-block mb-3">Colonias</a>
                                <a href="{{ route('estadosdesimpatia.index') }}" class="btn btn-primary btn-block mb-3">Estados de Simpatía</a>
                                <a href="{{ route('personas.index') }}" class="btn btn-primary btn-block mb-3">Personas</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="btn-group-vertical w-100">
                                
                                <a href="{{ route('tipos_comunicaciones.index') }}" class="btn btn-secondary btn-block mb-3">Tipos de Comunicaciones</a>
                                <a href="{{ route('comunicaciones.index') }}" class="btn btn-secondary btn-block mb-3">Comunicación</a>
                                <a href="{{ route('elecciones.index') }}" class="btn btn-secondary btn-block mb-3">Elecciones</a>
                                <a href="{{ route('candidatos.index') }}" class="btn btn-secondary btn-block mb-3">Candidatos</a>
                                <a href="{{ route('candidatos_por_eleccion.index') }}" class="btn btn-secondary btn-block mb-3">Candidatos por Elección</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="btn-group-vertical w-100">
                                <a href="{{ route('cuestionarios.index') }}" class="btn btn-info btn-block mb-3">Cuestionarios</a>
                                <a href="{{ route('tipo_preguntas.index') }}" class="btn btn-info btn-block mb-3">Tipos de Pregunta</a>
                                <a href="{{ route('preguntas.index') }}" class="btn btn-info btn-block mb-3">Preguntas</a>
                                <a href="{{ route('opcionesrespuestas.index') }}" class="btn btn-info btn-block mb-3">Opciones de Respuesta</a>

                                <a href="{{ route('cuestionarios_usuario.index') }}" class="btn btn-info btn-block mb-3">Cuestionarios para los usuarios</a>
                                <a href="{{ route('respuestas_usuario.index') }}" class="btn btn-info btn-block mb-3">Respuestas de Usuario</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
