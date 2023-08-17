<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use Illuminate\Http\Request;
use App\Models\Eleccion;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CandidatosController extends Controller
{
    public function index()
    {
        $candidatos = Candidato::all();
        return view('candidatos.index', compact('candidatos'));
    }
    
    public function create()
    {
        $elecciones = Eleccion::all();
        return view('candidatos.create', compact('elecciones'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',
            'partido_politico' => 'required|string',
            'foto' => 'nullable|image',
            'biografia' => 'required|string',
            'estado' => 'required|string',
            'eleccion_id' => 'required|exists:elecciones,id',
            'edad' => 'required|integer',
            'posicion' => 'required|string'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $validatedData = $validator->validated();
    
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'foto_' . time() . '.' . $extension;
            $file->storeAs('public/fotos', $filename);
            $validatedData['foto'] = $filename;
        }
    
        Candidato::create($validatedData);
        return redirect()->route('candidatos.index');
    }
    

    public function show($id)
    {
        $candidato = Candidato::findOrFail($id);
        return view('candidatos.show', compact('candidato'));
    }

    public function edit($id)
    {
        $candidato = Candidato::findOrFail($id);
        $elecciones = Eleccion::all();
        return view('candidatos.edit', compact('candidato', 'elecciones'));
    }

    public function update(Request $request, $id)
    {
        $candidato = Candidato::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'email' => 'required|email',
            'telefono' => 'required|string',
            'partido_politico' => 'required|string',
            'foto' => 'nullable|image',
            'biografia' => 'required|string',
            'estado' => 'required|string',
            'eleccion_id' => 'required|exists:elecciones,id',
            'edad' => 'required|integer',
            'posicion' => 'required|string'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extension = $file->getClientOriginalExtension();
            $filename = 'foto_' . time() . '.' . $extension;
            $file->storeAs('public/fotos', $filename);
            $validatedData['foto'] = $filename;
        }

        $candidato->update($request->all());
        return redirect()->route('candidatos.index');
    }

    public function destroy($id)
    {
        $candidato = Candidato::findOrFail($id);

        // Eliminar la foto del almacenamiento
        Storage::disk('public')->delete('fotos/' . $candidato->foto);

        $candidato->delete();
        return redirect()->route('candidatos.index');
    }
}
