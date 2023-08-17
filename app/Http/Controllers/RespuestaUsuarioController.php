<?php

namespace App\Http\Controllers;

use App\Models\Cuestionario;
use App\Models\RespuestaUsuario;
use App\Models\CuestionariosUsuario;
use App\Models\Pregunta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RespuestaUsuarioController extends Controller
{
    public function index()
    {
        $respuestasUsuario = RespuestaUsuario::all();
        return view('respuestas_usuario.index', compact('respuestasUsuario'));
    }

    public function create($idCuestionario)
    {
        // Obtener el cuestionario por su ID
        $cuestionario = Cuestionario::find($idCuestionario);

        // Si el cuestionario no se encuentra, puedes manejar el error o redireccionar
        if (!$cuestionario) {
            return redirect()->route('nombre_de_ruta_de_redireccion')->with('error', 'Cuestionario no encontrado');
        }

        // Obtener las preguntas disponibles para seleccionar
        $preguntas = Pregunta::where('idCuestionario', $idCuestionario)->get();

        return view('respuestas_usuario.create', compact('cuestionario', 'preguntas'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idCU' => 'required|exists:cuestionarios_usuario,idCU',
            'idPregunta' => 'required|exists:preguntas,idPregunta',
            'Respuesta' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        RespuestaUsuario::create($request->all());
        return redirect()->route('respuestas_usuario.index')->with('success', 'Respuesta de usuario creada exitosamente');
    }

    public function show($id)
    {
        $respuestaUsuario = RespuestaUsuario::findOrFail($id);
        return view('respuestas_usuario.show', compact('respuestaUsuario'));
    }

    public function edit($id)
    {
        $respuestaUsuario = RespuestaUsuario::findOrFail($id);
        $preguntas = Pregunta::all();
        return view('respuestas_usuario.edit', compact('respuestaUsuario', 'preguntas'));
    }

    public function update(Request $request, $id)
    {
        $respuestaUsuario = RespuestaUsuario::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'idCU' => 'required|exists:cuestionarios_usuario,idCU',
            'idPregunta' => 'required|exists:preguntas,idPregunta',
            'Respuesta' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $respuestaUsuario->update($request->all());
        return redirect()->route('respuestas_usuario.index')->with('success', 'Respuesta de usuario actualizada exitosamente');
    }

    public function destroy($id)
    {
        $respuestaUsuario = RespuestaUsuario::findOrFail($id);
        $respuestaUsuario->delete();
        return redirect()->route('respuestas_usuario.index')->with('success', 'Respuesta de usuario eliminada exitosamente');
    }
}
