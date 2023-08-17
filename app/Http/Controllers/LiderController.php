<?php

namespace App\Http\Controllers;

use App\Models\Lider;
use App\Models\Distrito;
use Illuminate\Http\Request;

class LiderController extends Controller
{
    public function index()
    {
        $lideres = Lider::all();

        return view('lideres.index', compact('lideres'));
    }

    public function create()
    {
        $distritos = Distrito::all();

        return view('lideres.create', compact('distritos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'distrito_id' => 'required',
        ]);

        Lider::create($data);

        return redirect()->route('lideres.index')->with('success', 'Líder creado exitosamente.');
    }

    public function show($id)
    {
        $lider = Lider::findOrFail($id);

        return view('lideres.show', compact('lider'));
    }

    public function edit($id)
    {
        $lider = Lider::findOrFail($id);
        $distritos = Distrito::all();

        return view('lideres.edit', compact('lider', 'distritos'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required',
            'distrito_id' => 'required',
        ]);

        $lider = Lider::findOrFail($id);
        $lider->update($data);

        return redirect()->route('lideres.index')->with('success', 'Líder actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $lider = Lider::findOrFail($id);
        $lider->delete();

        return redirect()->route('lideres.index')->with('success', 'Líder eliminado exitosamente.');
    }
}
