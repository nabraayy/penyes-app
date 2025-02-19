<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penya;
use App\Models\User;
use App\Models\Requests;
use App\Models\Relation;
use Illuminate\Support\Facades\Auth;


class RequestController extends Controller
{

    public function create(){
        $penyas=Penya::all();
        return view('user.request',compact('penyas'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'penya_id' => 'required|exists:penyas,id',
            'description' => 'nullable|string|max:255',
            
        ]);
        // Verificar si el usuario ya tiene una solicitud pendiente o aceptada en esta Peña
        $existingRequest = Requests::where('user_id', Auth::id())
        ->where('penya_id', $request->penya_id)
        ->whereIn('status', ['pending', 'accepted'])
        ->first();

        if ($existingRequest) {
        return redirect()->route('user.dashboard')->with('error', 'Ya tienes una solicitud pendiente o aceptada para esta Peña.');
        }
        Requests::create([
            'user_id' => Auth::id(),
            'penya_id' => $request->penya_id,
            'description' => $request->description,
            'status' => 'pending',
            'name'=>'Nombre usuario'
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Solicitud enviada con éxito.');
    }
    // Mostrar solicitudes al admin
    public function index()
    {
        $requests = Requests::with('user', 'penya')->where('status', 'pending')->get();
        return view('admin.requests.index', compact('requests'));
    }
    // Aceptar solicitud
    public function accept($id)
    {
        $request = Requests::findOrFail($id);

        if ($request->status !== 'pending') {
            return redirect()->route('admin.requests')->with('error', 'La solicitud no está pendiente.');
        }
        $user = User::find($request->user_id);
        $penya = Penya::find($request->penya_id);

        if (!$user || !$penya) {
            return redirect()->route('admin.requests')->with('error', 'Error al encontrar el usuario o la peña.');
        }
        // Actualizar el estado de la solicitud a "aceptada"
        $request->update(['status' => 'accepted']);
       
        if (Relation::where('user_id', $user->id)->where('penya_id', $penya->id)->exists()) {
            return redirect()->route('admin.requests')->with('error', 'El usuario ya es miembro de esta Peña.');
        }

        // Creamos la relación entre el usuario y la peña en la tabla relations
        Relation::create([
            'user_id' => $user->id,
            'penya_id' => $penya->id,
 
            'status' => 'aceptada',
        ]);
    
        return redirect()->route('admin.requests')->with('success', 'Solicitud aceptada.');
    }
     // Rechazar solicitud
     public function reject($id)
     {
         $request = Requests::findOrFail($id);
         $request->update(['status' => 'rejected']);
 
         return redirect()->route('admin.requests')->with('error', 'Solicitud rechazada.');
     }
     /*public function lottery()
     {
        $penyas=Penya::all();
        return view('user.lottery', compact('penyas'));
     }*/
        
}




