<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penya;
use App\Models\User;
use App\Models\Relation;
class PenyaController extends Controller
{
    public function index()
    {
       
        $penyas = Penya::withCount('members')->get();
        return view('admin.penyas.listas', compact('penyas'));
    }

    public function create()
    {
        return view('admin.penyas.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'formacion_anio' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Penya::create($request->all());

        return redirect()->route('admin.penyas.index')->with('success', 'Peña creada exitosamente.');
    }

    public function edit($id)
    {
        $penya = Penya::findOrFail($id);
        return view('admin.penyas.edit', compact('penya'));
    }

    public function update(Request $request, $id)
    {
        $penya = Penya::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $penya->update($request->all());

        return redirect()->route('admin.penyas.index')->with('success', 'Peña actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $penya = Penya::findOrFail($id);
        $penya->delete();

        return redirect()->route('admin.penyas.index')->with('success', 'Peña eliminada exitosamente.');
    }
    public function request()
    {
        $penya = User::all();
        return view('user.request');
    }
    public function listado()
    {
        $penyas = Penya::all();
        foreach($penyas as $penya){
            $penya->nMembers = Relation::where('penya_id', $penya->id)->count();
        }
        return view('user.listadopenyas', compact('penyas'));
    }

    // app/Http/Controllers/PenyaController.php
    public function show($id)
    {
        // Obtener la peña con sus usuarios (miembros)
        $peña = Peña::with('users')->findOrFail($penya_id);

        return view('penya', compact('penya'));
    }

}
