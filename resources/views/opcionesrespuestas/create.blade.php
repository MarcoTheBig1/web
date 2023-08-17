@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Solo podrás agregar respuestas a las preguntas de tipo opción múltiple</h1>

    @if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('opcionesrespuestas.storeRespuestas') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="idCuestionario">Seleccionar Cuestionario:</label>
            <select class="form-control" id="idCuestionario" name="idCuestionario">
                @foreach ($cuestionarios as $cuestionario)
                <option value="{{ $cuestionario->idCuestionario }}">{{ $cuestionario->nombre_cuestionario }}</option>
                @endforeach
            </select>
        </div>

        <div id="preguntasContainer" style="display: none;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="3" style="background-color: #007BFF; color: white; text-align: center;" id="cuestionarioNombre"></th>
                    </tr>
                    <tr>
                        <th>Pregunta</th>
                        <th>Tipo de Pregunta</th>
                        <th>Opciones (Respuestas)</th>
                    </tr>
                </thead>
                <tbody id="preguntasList" name="preguntasList">
                    <!-- Aquí se cargarán las preguntas específicas del cuestionario seleccionado -->
                </tbody>
            </table>
        </div>

        <a href="{{ route('opcionesrespuestas.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#idCuestionario").change(function() {
            var idCuestionario = $(this).val();

            $.ajax({
                url: "{{ route('opcionesrespuestas.getPreguntasByCuestionario') }}",
                method: "GET",
                data: {
                    idCuestionario: idCuestionario
                },
                success: function(response) {
                    var cuestionarioNombre = $("#idCuestionario option:selected").text();
                    $("#cuestionarioNombre").text(cuestionarioNombre);
                    var preguntasHtml = "";
                    for (var i = 0; i < response.length; i++) {
                        var pregunta = response[i];
                        preguntasHtml += '<tr data-pregunta-id="' + pregunta.idPregunta + '">';
                        preguntasHtml += '<td>' + pregunta.Pregunta + '</td>';
                        preguntasHtml += '<td>';
                        preguntasHtml += pregunta.nombre_tipo_pregunta;
                        preguntasHtml += '</td>';
                        preguntasHtml += '<td>';
                        if (pregunta.idTipoPregunta === 3) {
                            // Pregunta de opción múltiple, agregar botón para agregar opciones de respuesta
                            preguntasHtml += '<div class="input-group mb-3 opciones-respuesta-container">';
                            preguntasHtml += '<input type="text" class="form-control opcion-respuesta-input" placeholder="Ingrese opción de respuesta">';
                            preguntasHtml += '<div class="input-group-append">';
                            preguntasHtml += '<button class="btn btn-primary agregar-opcion-btn" type="button">Agregar</button>';
                            preguntasHtml += '</div>';
                            preguntasHtml += '</div>';
                            preguntasHtml += '<ul class="opciones-respuesta-list" style="list-style-type: none;"></ul>'; // Lista para mostrar opciones de respuesta
                        } else if (pregunta.idTipoPregunta === 1) {
                            // Pregunta cerrada (solo sí o no)
                            preguntasHtml += '<div class="form-check form-check-inline">';
                            preguntasHtml += '<input class="form-check-input" type="radio" name="pregunta_' + pregunta.idPregunta + '" value="Sí"disabled>';
                            preguntasHtml += '<label class="form-check-label">Sí</label>';
                            preguntasHtml += '</div>';
                            preguntasHtml += '<div class="form-check form-check-inline">';
                            preguntasHtml += '<input class="form-check-input" type="radio" name="pregunta_' + pregunta.idPregunta + '" value="No"disabled>';
                            preguntasHtml += '<label class="form-check-label">No</label>';
                            preguntasHtml += '</div>';
                        } else {
                            // Pregunta abierta, dejar en blanco
                            preguntasHtml += '<input type="text" class="form-control opcion-respuesta-input" placeholder="Respuesta abierta"disabled>';
                        }
                        preguntasHtml += '</td>';
                        preguntasHtml += '</tr>';
                    }

                    $("#preguntasList").html(preguntasHtml);
                    $("#preguntasContainer").show();
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
        // Agregar evento click para botones de agregar opción
        $(document).on('click', '.agregar-opcion-btn', function() {
            var opcion = $(this).closest('tr').find('.opcion-respuesta-input').val();
            var preguntaId = $(this).closest('tr').data('pregunta-id');
            var botonAgregar = $(this);

            // Agregar la opción de respuesta al campo "opciones" del formulario solo para la pregunta actual
            var opciones = [];
            $(this).closest('tr').find('.opcion-respuesta-input').each(function() {
                opciones.push($(this).val());
            });
            $('input[name="opciones"]').val(opciones.join(',')); // Actualizar el valor del campo "opciones"

            $.ajax({
                url: "{{ route('opcionesrespuestas.storeRespuestas') }}",
                method: "POST",
                data: {
                    idCuestionario: $("#idCuestionario").val(),
                    idPregunta: preguntaId,
                    opciones: opciones,
                    _token: "{{ csrf_token() }}"
                },
                success: function(response) {
                    alert("Opciones de respuesta guardadas correctamente.");

                    // Actualizar la lista de opciones en la tabla para mostrar las nuevas opciones de respuesta
                    var opcionesRespuestaHtml = '';
                    for (var i = 0; i < opciones.length; i++) {
                        opcionesRespuestaHtml += '<li>' + opciones[i] + '</li>';
                    }
                    botonAgregar.closest('tr').find('.opciones-respuesta-list').html(opcionesRespuestaHtml);
                },
                error: function(error) {
                    console.error("Error al guardar opciones de respuesta:", error);
                    alert("Hubo un error al guardar las opciones de respuesta. Por favor, intenta nuevamente o contacta al administrador del sistema.");
                }
            });
        });
    });
</script>

@endsection
