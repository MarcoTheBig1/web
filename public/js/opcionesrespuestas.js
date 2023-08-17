// En lugar de utilizar "{{ route('opcionesrespuestas.getPreguntas') }}", vamos a definir la URL directamente.
var urlGetPreguntas = "/opcionesrespuestas/getPreguntas";

// Función para cargar las preguntas asociadas al cuestionario seleccionado
function cargarPreguntas(idCuestionario) {
    $.ajax({
        url: urlGetPreguntas,
        method: 'GET',
        data: {
            idCuestionario: idCuestionario
        },
        success: function(response) {
            var options = '<option value="">Seleccionar pregunta</option>';
            response.forEach(function(pregunta) {
                options += '<option value="' + pregunta.idPregunta + '">' + pregunta.pregunta + '</option>';
            });
            $("#pregunta").html(options);
        },
        error: function(error) {
            console.log(error);
        }
    });
}
