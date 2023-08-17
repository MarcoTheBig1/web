<?php


namespace App\Http\Controllers;
use App\Models\TipoComunicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TipoComunicacionController extends Controller
{
    public function index()
    {
        $tiposComunicacion = TipoComunicacion::all();
        return view('tipos_comunicaciones.index', compact('tiposComunicacion'));
    }
    public function create()
    {
        return view('tipos_comunicaciones.create');
    }
    


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:tipos_comunicaciones'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        TipoComunicacion::create($request->all());
        return redirect()->route('tipos_comunicaciones.index')->with('success', 'Tipo de comunicación creado exitosamente');
    }

    public function edit($id)
    {
        $tipoComunicacion = TipoComunicacion::findOrFail($id);
        return view('tipos_comunicaciones.edit', compact('tipoComunicacion'));
    }

    public function update(Request $request, $id)
    {
        $tipoComunicacion = TipoComunicacion::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|unique:tipos_comunicaciones,nombre,' . $id
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tipoComunicacion->update($request->all());
        return redirect()->route('tipos_comunicaciones.index')->with('success', 'Tipo de comunicación actualizado exitosamente');
    }

    public function destroy($id)
    {
        $tipoComunicacion = TipoComunicacion::findOrFail($id);
        $tipoComunicacion->delete();
        return redirect()->route('tipos_comunicaciones.index')->with('success', 'Tipo de comunicación eliminado exitosamente');
    }
}
