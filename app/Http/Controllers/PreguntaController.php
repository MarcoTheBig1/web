<?php
namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\Pregunta;
use App\Models\TipoPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    public function create(Request $request)
    {
        $idCuestionario = $request->query('idCuestionario');
        $nombreCuestionario = $request->query('nombreCuestionario');
    
        // Asegurarse de que el idCuestionario esté presente
        if (!$idCuestionario) {
            return redirect()->back()->withErrors(['idCuestionario' => 'El campo idCuestionario es obligatorio.'])->withInput();
        }
    
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        $tiposPregunta = TipoPregunta::all();
    
        return view('preguntas.create', compact('cuestionario', 'tiposPregunta', 'nombreCuestionario'));
    }
    

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idCuestionario' => 'required|exists:cuestionarios,idCuestionario',
            'pregunta' => 'required|string',
            'idTipoPregunta' => 'required|exists:tipos_preguntas,idTipoPregunta'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Crea la pregunta sin las opciones de respuesta
        $pregunta = Pregunta::create($request->only(['idCuestionario', 'pregunta', 'idTipoPregunta']));
    
        // Si es una pregunta de tipo cerrada u opción múltiple, guarda las opciones de respuestas
        if ($request->input('idTipoPregunta') === 'cerrada' || $request->input('idTipoPregunta') === 'opcion_multiple') {
            $opciones = $request->input('opciones');
            if ($opciones) {
                $opcionesArray = explode(',', $opciones);
                $pregunta->opciones()->createMany(array_map(function ($opcion) {
                    return ['contenido' => trim($opcion)];
                }, $opcionesArray));
            }
        }
    
        return redirect()->route('preguntas.index')->with('success', 'Pregunta creada exitosamente');
    }



    public function edit($idPregunta)
    {
        $pregunta = Pregunta::findOrFail($idPregunta);
        $cuestionarios = Cuestionario::all();
        $tiposPregunta = TipoPregunta::all();

        return view('preguntas.edit', compact('pregunta', 'cuestionarios', 'tiposPregunta'));
    }

    public function update(Request $request, $idPregunta)
    {
        $pregunta = Pregunta::findOrFail($idPregunta);

        $validator = Validator::make($request->all(), [
            'idCuestionario' => 'required|exists:cuestionarios,idCuestionario',
            'pregunta' => 'required|string',
            'idTipoPregunta' => 'required|exists:tipos_preguntas,idTipoPregunta'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pregunta->update($request->all());
        return redirect()->route('preguntas.index')->with('success', 'Pregunta actualizada exitosamente');
    }

    public function destroy($idPregunta)
    {
        $pregunta = Pregunta::findOrFail($idPregunta);
        $pregunta->delete();
        return redirect()->route('preguntas.index')->with('success', 'Pregunta eliminada exitosamente');
    }
}

