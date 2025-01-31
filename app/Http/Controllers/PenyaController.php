<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penya;

class PenyaController extends Controller
{
    public function index()
    {
        $penyas = Penya::all();
        return view('admin.penyas.index', compact('penyas'));
    }

    public function create()
    {
        return view('admin.penyas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
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
    
}
