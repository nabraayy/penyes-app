<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penya;
use App\Models\Requests; // Si tienes un modelo de Solicitudes o lo que sea que usas
use Illuminate\Http\Request as HttpRequest;
use App\Models\Relation;

class AdminController extends Controller
{
    // Mostrar el dashboard del administrador
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Mostrar todos los usuarios
    public function manageUsers()
    {
        $users = User::all();  // Obtener todos los usuarios
        return view('admin.users.index', compact('users'));  // Vista con todos los usuarios
    }

    // Crear un nuevo usuario
    public function createUser(HttpRequest $request)
    {
        if ($request->isMethod('get')) {
            // Si es un GET, mostrar el formulario de creación
            return view('admin.users.create');
        }
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
        ]);
    
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password123'), // Set a default password or handle it properly
        ]);
        return view('admin.users.create');  // Vista para crear un nuevo usuario
    }


    //validacion de creacion usuario
    public function storeUser(HttpRequest $request)
    {
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Asegúrate de que 'email' esté marcado como único
        ]);

        // Crear el nuevo usuario
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password123'), // Asegúrate de manejar correctamente la contraseña
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.users')->with('success', 'Usuario creado exitosamente.');
    }


    // Editar un usuario
    public function editUser($id)
    {
        $user = User::findOrFail($id);  // Buscar el usuario por ID
        return view('admin.users.edit', compact('user'));  // Vista para editar usuario
    }

    // Actualizar un usuario
    public function updateUser(HttpRequest $request, $id)
    {
        $request->validate([
            'name'=>'required|string|max:255',
        ]);
        $users = User::findOrFail($id);
        $users->update($request->all());  // Actualiza los campos del usuario con los datos del formulario
        return redirect()->route('admin.users')->with('success', 'Usuario actualizado correctamente');
    }

    // Eliminar un usuario
    public function deleteUser($id)
    {
        $users = User::findOrFail($id);  // Buscar el usuario por ID
        $users->delete();  // Eliminar el usuario
        return redirect()->route('admin.users')->with('success', 'Usuario eliminado correctamente');
    }

    
    // Mostrar todas las peñas
    public function managePenyas()
    {
        $penyas = Penya::all();  // Obtener todas las peñas
        foreach($penyas as $penya){
            $penya->nMembers = Relation::where('penya_id', $penya->id)->count();
        }
    
        return view('admin.penyas.index', compact('penyas'));  // Vista con todas las peñas
    }

    // Crear una nueva peña
    public function create()
    {
        $penyas = Penya::all();
        return view('admin.penyas.create', compact('penyas'));
    }

    // Editar una peña
    public function edit($id)
    {
        $penya = Penya::findOrFail($id);  // Buscar la peña por ID
        return view('admin.penyas.edit', compact('penya'));  // Vista para editar la peña
    }

    // Actualizar una peña
    public function updatePenya(HttpRequest $request, $id)
    {
        $penya = Penya::findOrFail($id);  // Buscar la peña por ID
        $penya->update($request->all());  // Actualiza los datos de la peña
        return redirect()->route('admin.penyas')->with('success', 'Peña actualizada correctamente');
    }

    // Eliminar una peña
    public function deletePenya($id)
    {
        $penya = Penya::findOrFail($id);  // Buscar la peña por ID
        $penya->delete();  // Eliminar la peña
        return redirect()->route('admin.penyas')->with('success', 'Peña eliminada correctamente');
    }

    // Ver relaciones entre usuarios y peñas
    public function viewRelations()
    {
        $relations = User::with('penya')->get();
        // echo '<pre>';
        // dd($relations->toArray());
          // Relación entre User y Peña
        return view('admin.relations.index', compact('relations'));
    }


    public function editRelation($id)
    {
        
        $relation = Relation::with('user')->find($id);
        if (!$relation) {
            return redirect()->route('admin.relations.index')->with('error', 'Relación no encontrada');
        }
        $penyas = Penya::all();
        return view('admin.relations.edit', compact('relation', 'penyas'));             

    }


    public function updateRelation(HttpRequest $request, $id)
    {
        // Validar la entrada (si es necesario)
        $request->validate([
            'penya_id' => 'required|exists:penyas,id', // Validar que la peña existe
        ]);

        // Buscar la relación existente
        $relation = Relation::findOrFail($id);

        // Actualizar la peña de la relación
        $relation->update([
            'penya_id' => $request->penya_id,
        ]);

        // Redirigir de nuevo con un mensaje de éxito
        return redirect()->route('admin.relations.index')->with('success', 'Relación actualizada con éxito.');
    }


    // eliminar relacion
    public function destroy($id)
    {
        $relation = Relation::findOrFail($id);
        $relation->delete();
        return back()->with('success', 'Relación eliminada con éxito.');
    }

        // app/Http/Controllers/AdminController.php
    public function acceptUserRequest($penya_id, $user_id)
    {
        // Cambiar el estado de la solicitud a "aceptada"
        $relation = Relation::where('penya_id', $penya_id)
                            ->where('user_id', $user_id)
                            ->first();

        if ($relation) {
            // Actualizar el estado
            $relation->estado = 'aceptada';
            $relation->save();
        }

        return redirect()->route('admin.penya', ['id' => $penya_id]);  // Redirigir a la página de la peña
    }



    //penyas
    public function listasPenya(){
        $penyas = Penya::withCount('users')->get();
        return view('admin.penyas', compact('penyas'));
    }
    public function solicitudPenya(){
        $penyas = Penya::withCount('members')->get();
        return view('admin.penyas.create', compact('penyas'));

    }

    //para validar los datos
    public function storePenyas(HttpRequest $request)
    {
        
        // Validar los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        // Crear una nueva peña en la base de datos
        Penya::create([
            'name' => $request->name,
             'description' => $request->description,
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.penyas')->with('success', 'Peña creada correctamente.');
    }


    
}

