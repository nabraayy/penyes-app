<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenyaController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {

    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user',[UserController::class, 'dashboard'])->name('user.dashboard');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/profile/edit',[]);//////
});

//rutas de registro


require __DIR__.'/auth.php';

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login',function(){
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('logout',function(Request $request){
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});
//rutas de admin y user, despues del login
Route::get('/admin',function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/user', function(){
    return view('user.dashboard');
})->name('user.dashboard');


//rutas administrador
// Rutas para la administración de usuarios
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

// Rutas para la administración de Peñas
Route::get('/admin/penyas', [AdminController::class, 'managePenyas'])->name('admin.penyas');
Route::get('/admin/penyas/create', [AdminController::class, 'create'])->name('admin.penyas.create');
Route::get('/admin/penyas/{id}/edit', [AdminController::class, 'editPenya'])->name('admin.penyas.edit');
Route::delete('/admin/penyas/{id}', [AdminController::class, 'deletePenya'])->name('admin.penyas.delete');
Route::get('/admin/penyas/listas',[AdminController::class,'listasPenya'])->name('admin.penyas.listas');
// Ruta para ver las relaciones entre usuarios y peñas
Route::get('/admin/relaciones', [AdminController::class, 'viewRelations'])->name('admin.relations');

// Ruta para gestionar las solicitudes
Route::get('/admin/penyas/solicitudes', [AdminController::class, 'manageRequests'])->name('admin.solicitudes');

//rutas usuario
//Route::get('/user', [UserController::class, 'dashboard'])->name('user.dashboard');


