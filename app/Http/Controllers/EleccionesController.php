<?php

namespace App\Http\Controllers;

use App\Models\Eleccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EleccionesController extends Controller
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
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'estado' => 'required|string',
            'posicion' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eleccion = Eleccion::create($request->all());
        return redirect()->route('elecciones.index')->with('success', 'Eleccion creada exitosamente');
    }

    public function show($id)
    {
        $eleccion = Eleccion::findOrFail($id);
        return view('elecciones.show', compact('eleccion'));
    }

    public function update(Request $request, $id)
    {
        $eleccion = Eleccion::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string',
            'descripcion' => 'required|string',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'estado' => 'required|string',
            'posicion' => 'required|string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $eleccion->update($request->all());
        return redirect()->route('elecciones.index')->with('success', 'Eleccion actualizada exitosamente');
    }

    public function destroy($id)
    {
        $eleccion = Eleccion::findOrFail($id);
        $eleccion->delete();
        return redirect()->route('elecciones.index')->with('success', 'Eleccion eliminada exitosamente');
    }
}
