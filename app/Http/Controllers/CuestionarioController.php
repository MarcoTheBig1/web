<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;

use App\Models\Cuestionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuestionarioController extends Controller
{
    public function index()
    {
        $cuestionarios = Cuestionario::all();
        return view('cuestionarios.index', compact('cuestionarios'));
    }

    public function create()
    {
        return view('cuestionarios.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fecha_creacion' => 'required|date',
            'nombre_cuestionario' => 'required|string',
            'descripcion_cuestionario' => 'required|string',
            'estatus' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Cuestionario::create($request->all());
        return redirect()->route('cuestionarios.index')->with('success', 'Cuestionario creado exitosamente');
    }

    public function edit($idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        return view('cuestionarios.edit', compact('cuestionario'));
    }
    public function show($idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        return view('cuestionarios.show', compact('cuestionario'));
    }



    public function update(Request $request, $id)
    {
        $cuestionario = Cuestionario::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'fecha_creacion' => 'required|date',
            'nombre_cuestionario' => 'required|string',
            'descripcion_cuestionario' => 'required|string',
            'estatus' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cuestionario->update($request->all());
        return redirect()->route('cuestionarios.index')->with('success', 'Cuestionario actualizado exitosamente');
    }


    public function destroy($idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        $cuestionario->delete();
        return redirect()->route('cuestionarios.index')->with('success', 'Cuestionario eliminado exitosamente');
    }
    public function agregarPreguntas($idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        return view('cuestionarios.agregar_preguntas', compact('cuestionario'));
    }
    public function verPreguntas($idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);
        $preguntas = $cuestionario->preguntas;

        // Verificar si hay preguntas asociadas al cuestionario
        if ($preguntas->isEmpty()) {
            // Redirigir a alguna otra página o mostrar un mensaje de error
            return redirect()->route('cuestionarios.index')->with('error', 'El cuestionario no tiene preguntas asociadas.');
        }

        return view('cuestionarios.ver_preguntas', compact('cuestionario', 'preguntas'));
        
    }




    public function guardarPreguntas(Request $request, $idCuestionario)
    {
        $cuestionario = Cuestionario::findOrFail($idCuestionario);

        // Validar los datos de las preguntas aquí utilizando Validator si es necesario
        $validator = Validator::make($request->all(), [
            'preguntas' => 'required|array',
            'preguntas.*.texto' => 'required|string',
            'preguntas.*.opciones' => 'required|array',
            'preguntas.*.opciones.*' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Guardar las preguntas en la base de datos
        $preguntas = $request->input('preguntas');
        $cuestionario->preguntas()->createMany($preguntas);

        return redirect()->route('cuestionarios.index')->with('success', 'Preguntas guardadas exitosamente');
    }
}
