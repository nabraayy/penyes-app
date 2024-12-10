<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Models\User; // Importa el modelo User

class UserController extends Controller
{
    //  Muestra el dashboard del usuario
    public function dashboard()
    {
        return view('user.dashboard');
    }

    //  Redirección después de la autenticación
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin()) {
            return redirect('/Tareas/penyes-app/resources/views/admin/dashboard.blade.php');
        } elseif ($user->isUser) {
            return redirect('/Tareas/penyes-app/resources/views/user/dashboard.blade.php');
        }
        return redirect('/Tareas/penyes-app/resources/views/dashboard.blade.php');
    }

    // Nuevo método: Ver todos los usuarios
    public function index()
    {
        $users = User::all(); // Obtener todos los usuarios
        return view('users.index', compact('user'));
    }

    // Nuevo método: Formulario para crear un usuario
    public function create()
    {
        return view('users.create');
    }

    // Nuevo método: Guardar un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Nuevo método: Editar un usuario
    public function edit($id)
    {
        $user = User::findOrFail($id); // Busca el usuario por ID
        return view('users.edit', compact('user'));
    }

    // Nuevo método: Actualizar usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Nuevo método: Eliminar usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado exitosamente.');
    }

    // Nuevo método: Ver relaciones usuario-peña
    public function relations()
    {
        $user = User::with('penya')->get(); // Asume que User tiene relación con Penya
        return view('users.relations', compact('users'));
    }

    // Nuevo método: Gestionar solicitudes
    public function requests()
    {
        // Implementa lógica para solicitudes aquí
    }

    // Nuevo método: Aprobar solicitud
    public function approveRequest($id)
    {
        // Implementa lógica para aprobar solicitud aquí
    }
}
