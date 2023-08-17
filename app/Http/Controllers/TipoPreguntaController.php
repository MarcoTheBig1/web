<?php

namespace App\Http\Controllers;

use App\Models\TipoPregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoPreguntaController extends Controller
{
    public function index()
    {
        $tipoPreguntas = TipoPregunta::all();
        return view('tipo_preguntas.index', compact('tipoPreguntas'));
    }

    public function create()
    {
        return view('tipo_preguntas.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:tipos_preguntas'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TipoPregunta::create($request->all());
        return redirect()->route('tipo_preguntas.index')->with('success', 'Tipo de pregunta creado exitosamente');
    }

    public function edit($id)
    {
        $tipoPregunta = TipoPregunta::findOrFail($id);
        return view('tipo_preguntas.edit', compact('tipoPregunta'));
    }

    public function update(Request $request, $idTipoPregunta)
    {
        $tipoPregunta = TipoPregunta::findOrFail($idTipoPregunta);



        $tipoPregunta->nombre = $request->input('nombre');
        $tipoPregunta->save();
        return redirect()->route('tipo_preguntas.index')->with('success', 'Tipo de pregunta actualizado exitosamente');
    }

    public function destroy($id)
    {
        $tipoPregunta = TipoPregunta::findOrFail($id);
        $tipoPregunta->delete();
        return redirect()->route('tipo_preguntas.index')->with('success', 'Tipo de pregunta eliminado exitosamente');
    }
}
