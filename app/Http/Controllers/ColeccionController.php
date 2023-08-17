<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;

class EleccionController extends Controller
{
    public function index()
    {
        $elecciones = Eleccion::all();
        return view('elecciones.index', compact('elecciones'));
    }

    public function create()
    {
        return view('elecciones.create');
    }

    public function store(Request $request)
    {
        $elecciones = Eleccion::create($request->all());
        return redirect()->route('elecciones.index')->with('success', 'Eleccion creada correctamente');
    }

    public function show($id)
    {
        $eleccion = Eleccion::findOrFail($id);
        return view('elecciones.show', compact('eleccion'));
    }

    public function edit($id)
    {
        $eleccion = Eleccion::findOrFail($id);
        return view('elecciones.edit', compact('eleccion'));
    }

    public function update(Request $request, $id)
    {
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->update($request->all());
        return redirect()->route('elecciones.index')->with('success', 'Eleccion actualizada correctamente');
    }

    public function destroy($id)
    {
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->delete();
        return redirect()->route('elecciones.index')->with('success', 'Eleccion eliminada correctamente');
    }
}
