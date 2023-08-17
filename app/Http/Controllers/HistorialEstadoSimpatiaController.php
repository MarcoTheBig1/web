<?php

namespace App\Http\Controllers;

use App\Models\HistorialEstadoSimpatia;
use App\Models\Persona;
use App\Models\EstadosDeSimpatia;
use Illuminate\Http\Request;

class HistorialEstadoSimpatiaController extends Controller
{
    public function index()
    {
        $historiales = HistorialEstadoSimpatia::all();

        return view('historialestadossimpatia.index', compact('historiales'));
    }

    public function create()
    {
        $personas = Persona::all();
        $estadosSimpatia = EstadosDeSimpatia::all();

        return view('historialestadossimpatia.create', compact('personas', 'estadosSimpatia'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'persona_id' => 'required',
            'estado_simpatia_id' => 'required',
            'fecha' => 'required',
        ]);

        HistorialEstadoSimpatia::create($data);

        return redirect()->route('historial_estado_simpatia.index')->with('success', 'Registro creado exitosamente.');

    }

    public function show($id)
    {
        $historial = HistorialEstadoSimpatia::findOrFail($id);

        return view('historialestadossimpatia.show', compact('historial'));
    }

    public function edit($id)
    {
        $historial = HistorialEstadoSimpatia::findOrFail($id);
        $personas = Persona::all();
        $estadosSimpatia = EstadosDeSimpatia::all();

        return view('historialestadossimpatia.edit', compact('historial', 'personas', 'estadosSimpatia'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'persona_id' => 'required',
            'estado_simpatia_id' => 'required',
            'fecha' => 'required',
        ]);

        $historial = HistorialEstadoSimpatia::findOrFail($id);
        $historial->update($data);

        return redirect()->route('historialestadossimpatia.index')->with('success', 'Registro actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $historial = HistorialEstadoSimpatia::findOrFail($id);
        $historial->delete();

        return redirect()->route('historialestadossimpatia.index')->with('success', 'Registro eliminado exitosamente.');
    }
}
