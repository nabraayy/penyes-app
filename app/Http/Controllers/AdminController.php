<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Penya;
use App\Models\Request; // Si tienes un modelo de Solicitudes o lo que sea que usas
use Illuminate\Http\Request as HttpRequest;

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
    public function createUser()
    {
        return view('admin.users.create');  // Vista para crear un nuevo usuario
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
        return view('admin.penyas.index', compact('penyas'));  // Vista con todas las peñas
    }

    // Crear una nueva peña
    public function createPenya()
    {
        return view('admin.penyas.create');  // Vista para crear una nueva peña
    }

    // Editar una peña
    public function editPenya($id)
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
        $relations = User::with('penyas')->get();  // Relación entre User y Peña
        return view('admin.relations.index', compact('relations'));
    }

    // Gestionar solicitudes
    public function manageRequests()
    {
        $solicitudes = Request::all();  // Obtener todas las solicitudes
        return view('admin.requests.index', compact('solicitudes'));  // Vista de solicitudes
    }
}

