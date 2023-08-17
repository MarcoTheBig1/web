<?php

namespace App\Http\Controllers;

use App\Models\Colonia;
use App\Models\Distrito;
use App\Models\User;
use Illuminate\Http\Request;

class ColoniaController extends Controller
{
    public function index()
    {
        $colonias = Colonia::all();
        return view('colonias.index', compact('colonias'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 2); // Filtrar por el ID del rol de líder
        })->get();

        $distritos = Distrito::all();
        return view('colonias.create', compact('distritos', 'users'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'distrito_id' => 'required|exists:distritos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        Colonia::create($validatedData);

        return redirect()->route('colonias.index')->with('success', 'Colonia creada exitosamente.');
    }

    public function show($id)
    {
        $colonia = Colonia::findOrFail($id);
        return view('colonias.show', compact('colonia'));
    }

    public function edit($id)
    {
        $colonia = Colonia::findOrFail($id);
        $distritos = Distrito::all();
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 2); // Filtrar por el ID del rol de líder
        })->get();
        return view('colonias.edit', compact('colonia', 'distritos', 'users'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'distrito_id' => 'required|exists:distritos,id',
            'user_id' => 'required|exists:users,id',
        ]);

        $colonia = Colonia::findOrFail($id);
        $colonia->update($validatedData);

        return redirect()->route('colonias.index')->with('success', 'Colonia actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $colonia = Colonia::findOrFail($id);
        $colonia->delete();

        return redirect()->route('colonias.index')->with('success', 'Colonia eliminada exitosamente.');
    }
}
