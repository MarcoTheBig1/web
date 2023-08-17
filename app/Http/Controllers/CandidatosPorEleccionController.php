<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\CandidatoPorEleccion;
use App\Models\Eleccion;
use Illuminate\Http\Request;

class CandidatosPorEleccionController extends Controller
{
    public function index()
    {
        $candidatosPorEleccion = CandidatoPorEleccion::all();
        return view('candidatos_por_eleccion.index', compact('candidatosPorEleccion'));
    }

    public function create()
    {
        $candidatos = Candidato::all();
        $elecciones = Eleccion::all();
        return view('candidatos_por_eleccion.create', compact('candidatos', 'elecciones'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'candidato_id' => 'required|exists:candidatos,id',
            'eleccion_id' => 'required|exists:elecciones,id',
            'posicion' => 'required|string'
        ]);

        CandidatoPorEleccion::create($validatedData);

        return redirect()->route('candidatos_por_eleccion.index')->with('success', 'Candidato por Elección creado exitosamente.');
    }

    public function show($id)
    {
        $candidatoPorEleccion = CandidatoPorEleccion::findOrFail($id);
        return view('candidatos_por_eleccion.show', compact('candidatoPorEleccion'));
    }

    public function edit($id)
    {
        $candidatoPorEleccion = CandidatoPorEleccion::findOrFail($id);
        $candidatos = Candidato::all();
        $elecciones = Eleccion::all();
        return view('candidatos_por_eleccion.edit', compact('candidatoPorEleccion', 'candidatos', 'elecciones'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'candidato_id' => 'required|exists:candidatos,id',
            'eleccion_id' => 'required|exists:elecciones,id',
            'posicion' => 'required|string'
        ]);

        $candidatoPorEleccion = CandidatoPorEleccion::findOrFail($id);
        $candidatoPorEleccion->update($validatedData);

        return redirect()->route('candidatos_por_eleccion.index')->with('success', 'Candidato por Elección actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $candidatoPorEleccion = CandidatoPorEleccion::findOrFail($id);
        $candidatoPorEleccion->delete();

        return redirect()->route('candidatos_por_eleccion.index')->with('success', 'Candidato por Elección eliminado exitosamente.');
    }
}
