<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Colonia;
use App\Models\EstadosDeSimpatia;
use App\Models\Pregunta;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    public function create()
    {
        $colonias = Colonia::all();
        $estadosDeSimpatia = EstadosDeSimpatia::all();
        return view('personas.create', compact('colonias', 'estadosDeSimpatia'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'colonia_id' => 'required|exists:colonias,id',
            'estado_id' => 'required|exists:estados_de_simpatia,id',
        ]);
    
        $persona = new Persona();
        $persona->nombre = $validatedData['nombre'];
        $persona->apellido = $validatedData['apellido'];
        $persona->email = $validatedData['email'];
        $persona->telefono = $validatedData['telefono'];
        $persona->direccion = $validatedData['direccion'];
        $persona->colonia_id = $validatedData['colonia_id'];
        $persona->estado_id = $validatedData['estado_id'];
        $persona->save();
    
        return redirect()->route('personas.index')->with('success', 'Persona creada exitosamente.');
    }
    

    public function show($id)
    {
        $persona = Persona::findOrFail($id);
        return view('personas.show', compact('persona'));
    }

    public function edit($id)
    {
        
        $persona = Persona::findOrFail($id);
        $colonias = Colonia::all();
        $estadosDeSimpatia = EstadosDeSimpatia::all();
        return view('personas.edit', compact('persona', 'colonias', 'estadosDeSimpatia'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'direccion' => 'required',
            'colonia_id' => 'required|exists:colonias,id',
            'estado_id' => 'required|exists:estados_de_simpatia,id',
        ]);

        $persona = Persona::findOrFail($id);
        $persona->update($validatedData);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada exitosamente.');
    }

    public function destroy($idPregunta)
    {
        $pregunta = Pregunta::findOrFail($idPregunta);
        $pregunta->delete();
        return redirect()->route('preguntas.index')->with('success', 'Pregunta eliminada exitosamente');
    }
    
}
