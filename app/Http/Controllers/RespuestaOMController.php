<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\RespuestaOM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RespuestaOMController extends Controller
{
    public function index()
    {
        $respuestasOM = RespuestaOM::all();
        return view('respuestas_om.index', compact('respuestasOM'));
    }

    public function create()
    {
        $preguntas = Pregunta::all();
        return view('respuestas_om.create', compact('preguntas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idPregunta' => 'required|exists:preguntas,idPregunta',
            'Respuesta' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        RespuestaOM::create($request->all());

        return redirect()->route('respuestas_om.index')->with('success', 'Respuesta OM creada exitosamente');
    }

    public function update(Request $request, $id)
    {
        $respuestaOM = RespuestaOM::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'idPregunta' => 'required|exists:preguntas,idPregunta',
            'Respuesta' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $respuestaOM->update($request->all());

        return redirect()->route('respuestas_om.index')->with('success', 'Respuesta OM actualizada exitosamente');
    }

    public function destroy($id)
    {
        $respuestaOM = RespuestaOM::findOrFail($id);
        $respuestaOM->delete();

        return redirect()->route('respuestas_om.index')->with('success', 'Respuesta OM eliminada exitosamente');
    }
}
