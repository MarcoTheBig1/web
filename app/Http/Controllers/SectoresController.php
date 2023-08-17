<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\User;
use Illuminate\Http\Request;

class SectoresController extends Controller
{
    public function index()
    {
        $sectores = Sector::all();
        return view('sectores.index', compact('sectores'));
    }

    public function create()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 2); // Filtrar por el ID del rol de líder
        })->get();
        
        return view('sectores.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $sector = new Sector();
        $sector->nombre = $validatedData['nombre'];
        $sector->user_id = $validatedData['user_id'];
        $sector->save();
    
        return redirect()->route('sectores.index')->with('success', 'Sector creado exitosamente.');
    }
    
    

    public function show($id)
    {
        $sector = Sector::findOrFail($id);
        return view('sectores.show', compact('sector'));
    }

    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        $users = User::whereHas('roles', function ($query) {
            $query->where('id', 2); // ID del rol "lider"
        })->get();
    
        return view('sectores.edit', compact('sector', 'users'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'required',
            'user_id' => 'required|exists:users,id',
        ]);
    
        $sector = Sector::findOrFail($id);
        $sector->nombre = $validatedData['nombre'];
    
        if (isset($validatedData['user_id'])) {
            $sector->user_id = $validatedData['user_id'];
        }
    
        $sector->save();
    
        return redirect()->route('sectores.index')->with('success', 'Sector actualizado exitosamente.');
    }
    
    

    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        $sector->delete();

        return redirect()->route('sectores.index')->with('success', 'Sector eliminado exitosamente.');
    }
}

