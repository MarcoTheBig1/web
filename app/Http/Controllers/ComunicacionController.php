<?php

namespace App\Http\Controllers;

use App\Models\Comunicacion;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ComunicacionController extends Controller
{
    public function index()
    {
        $comunicaciones = Comunicacion::all();
        return view('comunicaciones.index', compact('comunicaciones'));
    }

    public function create()
    {
        $personas = Persona::all();
        $users = User::all();
        return view('comunicaciones.create', compact('personas', 'users'));
    }

    public function store(Request $request)
{
    dd($request->all());
    $validator = Validator::make($request->all(), [
        'persona_id' => 'required|exists:personas,id',
        'users_id' => 'required|exists:users,id',
        'tipo_id' => 'required|exists:tipos_comunicaciones,id',
        'contenido' => 'required',
        'fecha' => 'required|date',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $comunicacion = new Comunicacion();
    $comunicacion->persona_id = $request->input('persona_id');
    $comunicacion->users_id = $request->input('users_id');
    $comunicacion->tipo_id = $request->input('tipo_id');
    $comunicacion->contenido = $request->input('contenido');
    $comunicacion->fecha = $request->input('fecha');
    $comunicacion->save();

    return redirect()->route('comunicaciones.index')->with('success', 'Comunicación creada exitosamente.'); 
  }
    public function show($id)
    {
        $comunicacion = Comunicacion::findOrFail($id);
        return view('comunicaciones.show', compact('comunicacion'));
    }

    public function edit($id)
    {
        $comunicacion = Comunicacion::findOrFail($id);
        $personas = Persona::all();
        $users = User::all();
        return view('comunicaciones.edit', compact('comunicacion', 'personas', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'persona_id' => 'required|exists:personas,id',
            'users_id' => 'required|exists:users,id',
            'tipo_id' => 'required|exists:tipos_comunicaciones,id',
            'contenido' => 'required',
            'fecha' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comunicacion = Comunicacion::findOrFail($id);
        $comunicacion->update($request->all());

        return redirect()->route('comunicaciones.index')->with('success', 'Comunicación actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $comunicacion = Comunicacion::findOrFail($id);
        $comunicacion->delete();

        return redirect()->route('comunicaciones.index')->with('success', 'Comunicación eliminada exitosamente.');
    }
}
