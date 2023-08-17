<?php

namespace App\Http\Controllers;

use App\Models\RespuestaUsuario;
use App\Models\CuestionariosUsuario;
use App\Models\Pregunta;
use App\Models\Cuestionario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuestionariosUsuarioController extends Controller
{
    public function index()
    {
        $cuestionarios = Cuestionario::all();
        return view('cuestionarios_usuario.index', compact('cuestionarios'));
    }

    public function create()
    {
        // Obtener todos los cuestionarios disponibles
        $cuestionarios = Cuestionario::all();
        // Obtener todas las preguntas disponibles
        $preguntas = Pregunta::all();
        // Obtener todos los usuarios disponibles
        $usuarios = User::all();

        return view('cuestionarios_usuario.create', compact('cuestionarios', 'preguntas', 'usuarios'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idCuestionario' => 'required|exists:cuestionarios,idCuestionario',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'nullable|date',
            'idUsuario' => 'required|exists:users,id',
            'idUsuarioOperador' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        CuestionariosUsuario::create($request->all());
        return redirect()->route('cuestionarios_usuario.index')->with('success', 'Cuestionario Usuario creado exitosamente');
    }

    public function show($id)
    {
        $cuestionarioUsuario = CuestionariosUsuario::findOrFail($id);
        return view('cuestionarios_usuario.show', compact('cuestionarioUsuario'));
    }

    public function edit($id)
    {
        $cuestionarioUsuario = CuestionariosUsuario::findOrFail($id);
        $cuestionarios = Cuestionario::all();
        $preguntas = Pregunta::all();
        $usuarios = User::all();
        return view('cuestionarios_usuario.edit', compact('cuestionarioUsuario', 'cuestionarios', 'preguntas', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $cuestionarioUsuario = CuestionariosUsuario::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'idCuestionario' => 'required|exists:cuestionarios,idCuestionario',
            'FechaInicio' => 'required|date',
            'FechaFin' => 'nullable|date',
            'idUsuario' => 'required|exists:users,id',
            'idUsuarioOperador' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cuestionarioUsuario->update($request->all());
        return redirect()->route('cuestionarios_usuario.index')->with('success', 'Cuestionario Usuario actualizado exitosamente');
    }

    public function destroy($id)
    {
        $cuestionarioUsuario = CuestionariosUsuario::findOrFail($id);
        $cuestionarioUsuario->delete();
        return redirect()->route('cuestionarios_usuario.index')->with('success', 'Cuestionario Usuario eliminado exitosamente');
    }

    public function guardarRespuestas(Request $request, $id)
    {
        $cuestionarioUsuario = CuestionariosUsuario::findOrFail($id);

        // Validar y guardar las respuestas del usuario para cada pregunta
        $preguntas = Pregunta::all();

        foreach ($preguntas as $pregunta) {
            $respuesta = $request->input('respuesta.' . $pregunta->idPregunta);

            if ($respuesta !== null) {
                RespuestaUsuario::create([
                    'idCU' => $cuestionarioUsuario->idCU,
                    'idPregunta' => $pregunta->idPregunta,
                    'Respuesta' => $respuesta,
                ]);
            }
        }

        // Actualizar la fecha de fin del cuestionario usuario (se asume que el usuario ha terminado de contestar el cuestionario)
        $cuestionarioUsuario->FechaFin = now();
        $cuestionarioUsuario->save();

        return redirect()->route('cuestionarios_usuario.index')->with('success', 'Respuestas guardadas exitosamente');
    }
}
