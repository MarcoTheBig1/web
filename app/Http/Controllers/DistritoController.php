<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Sector;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index()
    {
        $distritos = Distrito::all();
        return view('distritos.index', compact('distritos'));
    }

    public function create()
    {
        $sectores = Sector::all();
        return view('distritos.create', compact('sectores'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'sector_id' => 'required|exists:sectores,id',
        ]);
    
        Distrito::create($validatedData);
    
        return redirect()->route('distritos.index')->with('success', 'Distrito creado exitosamente.');
    }
    

    public function show($id)
    {
        $distrito = Distrito::findOrFail($id);
        return view('distritos.show', compact('distrito'));
    }

    public function edit($id)
    {
        $distrito = Distrito::findOrFail($id);
        $sectores = Sector::all();
        return view('distritos.edit', compact('distrito', 'sectores'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'sector_id' => 'required',
        ]);

        $distrito = Distrito::findOrFail($id);
        $distrito->update($validatedData);

        return redirect()->route('distritos.index')->with('success', 'Distrito actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $distrito = Distrito::findOrFail($id);
        $distrito->delete();

        return redirect()->route('distritos.index')->with('success', 'Distrito eliminado exitosamente.');
    }
}
