<?php

namespace App\Http\Controllers;

use App\Models\EstadosDeSimpatia;
use Illuminate\Http\Request;

class EstadosDeSimpatiaController extends Controller
{
    public function index()
    {
        $estadosDeSimpatia = EstadosDeSimpatia::all();
        return view('estadosdesimpatia.index', compact('estadosDeSimpatia'));
    }

    public function create()
    {
        return view('estadosdesimpatia.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'estado' => 'required',
        ]);

        EstadosDeSimpatia::create($validatedData);

        return redirect()->route('estadosdesimpatia.index')->with('success', 'Estado de simpatía creado exitosamente.');
    }

    public function show($id)
    {
        $estadoDeSimpatia = EstadosDeSimpatia::findOrFail($id);
        return view('estadosdesimpatia.show', compact('estadoDeSimpatia'));
    }

    public function edit($id)
    {
        $estadoDeSimpatia = EstadosDeSimpatia::findOrFail($id);
        return view('estadosdesimpatia.edit', compact('estadoDeSimpatia'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'estado' => 'required',
        ]);

        $estadoDeSimpatia = EstadosDeSimpatia::findOrFail($id);
        $estadoDeSimpatia->update($validatedData);

        return redirect()->route('estadosdesimpatia.index')->with('success', 'Estado de simpatía actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $estadoDeSimpatia = EstadosDeSimpatia::findOrFail($id);
        $estadoDeSimpatia->delete();

        return redirect()->route('estadosdesimpatia.index')->with('success', 'Estado de simpatía eliminado exitosamente.');
    }
}
