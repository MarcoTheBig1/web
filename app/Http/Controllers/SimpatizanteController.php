<?php

namespace App\Http\Controllers;

use App\Models\Simpatizante;
use App\Models\Distrito;
use Illuminate\Http\Request;

class SimpatizanteController extends Controller
{
    public function index()
    {
        $simpatizantes = Simpatizante::all();

        return view('simpatizantes.index', compact('simpatizantes'));
    }

    public function create()
    {
        $distritos = Distrito::all();

        return view('simpatizantes.create', compact('distritos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'distrito_id' => 'required',
        ]);

        Simpatizante::create($data);

        return redirect()->route('simpatizantes.index')->with('success', 'Simpatizante creado exitosamente.');
    }

    public function show($id)
    {
        $simpatizante = Simpatizante::findOrFail($id);

        return view('simpatizantes.show', compact('simpatizante'));
    }

    public function edit($id)
    {
        $simpatizante = Simpatizante::findOrFail($id);
        $distritos = Distrito::all();

        return view('simpatizantes.edit', compact('simpatizante', 'distritos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'distrito_id' => 'required',
        ]);

        $simpatizante = Simpatizante::findOrFail($id);
        $simpatizante->update($data);

        return redirect()->route('simpatizantes.index')->with('success', 'Simpatizante actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $simpatizante = Simpatizante::findOrFail($id);
        $simpatizante->delete();

        return redirect()->route('simpatizantes.index')->with('success', 'Simpatizante eliminado exitosamente.');
    }
}
