<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Cuestionario;
use App\Models\Pregunta;
use App\Models\OpcionRespuesta;
use App\Models\TipoPregunta;

use Illuminate\Support\Facades\Validator;

class OpcionRespuestaController extends Controller
{
    public function index()
    {
        $opcionRespuestas = OpcionRespuesta::all();
        return view('opcionesrespuestas.index', compact('opcionRespuestas'));
    }

    public function create()
    {
        $cuestionarios = Cuestionario::all();
        $tiposPregunta = TipoPregunta::all();
        $preguntas = []; // Inicializamos un array vacío para almacenar las preguntas asociadas al cuestionario seleccionado

        return view('opcionesrespuestas.create', compact('cuestionarios', 'tiposPregunta', 'preguntas'));
    }

    public function storeRespuestas(Request $request)
    {

        // Validar que las respuestas no estén vacías
        $validator = Validator::make($request->all(), [
            'opciones' => 'required|array',
            'opciones.*' => 'required',
        ]);

       

         $opciones = $request->input('opciones');
         foreach ($opciones as $opcion) {
            if(!is_null($opcion))
            
                        OpcionRespuesta::create([
                            'pregunta_id' => $request->idPregunta,
                            'contenido' => $opcion,
                        ]);
                    
         }
        
        return redirect()->route('preguntas.index')->with('success', 'Respuestas guardadas exitosamente.');
    }





    public function getPreguntas(Request $request)
    {
        $idCuestionario = $request->input('idCuestionario');
        $idTipoPregunta = $request->input('idTipoPregunta');

        $preguntas = Pregunta::where('idCuestionario', $idCuestionario)
            ->get();


        foreach ($preguntas as $pregunta) {
            $pregunta->nombre_tipo_pregunta = $pregunta->tipoPregunta->nombre;
        }


        return response()->json($preguntas);
    }



public function getPreguntasByCuestionario(Request $request)
{
    $validator = Validator::make($request->all(), [
        'idCuestionario' => 'required|exists:cuestionarios,idCuestionario',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => 'Datos de entrada inválidos'], 400);
    }

    $idCuestionario = $request->input('idCuestionario');
    $preguntas = Pregunta::where('idCuestionario', $idCuestionario)->get();

    foreach ($preguntas as $pregunta) {
        $pregunta->nombre_tipo_pregunta = $pregunta->tipoPregunta->nombre;
    }

    return response()->json($preguntas);
}



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pregunta' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Guardar la pregunta
        $pregunta = Pregunta::create([
            'idCuestionario' => $request->idCuestionario,
            'pregunta' => $request->pregunta,
        ]);

        // Guardar las opciones de respuesta solo si la pregunta es de tipo "Opción Múltiple"
        if ($request->has('opciones')) {
            $opciones = explode(',', $request->input('opciones'));
            foreach ($opciones as $opcion) {
                OpcionRespuesta::create([
                    'pregunta_id' => $pregunta->idPregunta,
                    'contenido' => $opcion,
                ]);
            }
        }

        return redirect()->route('preguntas.index')->with('success', 'Pregunta y respuestas creadas exitosamente.');
    }

    public function show($id)
    {
        $opcionRespuesta = OpcionRespuesta::findOrFail($id);
        return view('opcionesrespuestas.show', compact('opcionRespuesta'));
    }

    public function edit($id)
    {
        $opcionRespuesta = OpcionRespuesta::findOrFail($id);
        $preguntas = Pregunta::all();
        return view('opcionesrespuestas.edit', compact('opcionRespuesta', 'preguntas'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'pregunta_id' => 'required|exists:preguntas,idPregunta',
            'contenido' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $opcionRespuesta = OpcionRespuesta::findOrFail($id);
        $opcionRespuesta->pregunta_id = $request->pregunta_id;
        $opcionRespuesta->contenido = $request->contenido;
        $opcionRespuesta->save();

        return redirect()->route('opcionesrespuestas.index')->with('success', 'Opción de respuesta actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $opcionRespuesta = OpcionRespuesta::findOrFail($id);
        $opcionRespuesta->delete();

        return redirect()->route('opcionesrespuestas.index')->with('success', 'Opción de respuesta eliminada exitosamente.');
    }
}
