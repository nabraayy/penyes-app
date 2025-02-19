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
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\LotteryController;



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


//rutas perfil usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth'])->group(function (){
    Route::get('/profile/edit',[]);//////
});

//rutas de autentificacion
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
//RUTAS USER
Route::middleware(['auth','role:user'])->group(function(){
    Route::get('/user',[UserController::class, 'dashboard'])->name('user.dashboard');
});
Route::get('/user', function(){
    return view('user.dashboard');
})->name('user.dashboard');

//USUARIO RUTA LISTADO PEÑAS
Route::get('user/listadopenyas',[PenyaController::class, 'listado'])->name('user.listado');
Route::get('user/request', [RequestController::class, 'create'])->name('user.request');
Route::post('user/request', [RequestController::class, 'request']);
// Usuario solicita unirse a una peña

    Route::get('user/request', [RequestController::class, 'create'])->name('user.request');
    Route::post('user/request', [RequestController::class, 'store']);


//SORTEO CARAFAL
Route::get('admin/lottery',[LotteryController::class,'show'])->name('admin.lottery');
Route::get('start-lottery',[LotteryController::class,'lottery'])->name('user.start.lottery');

//RUTAS ADMIN
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin',[AdminController::class, 'dashboard'])->name('admin.dashboard');
});
Route::get('/admin',function(){
    return view('admin.dashboard');
})->name('admin.dashboard');
// Rutas para la administración de usuarios
Route::get('/admin/users', [AdminController::class, 'manageUsers'])->name('admin.users');
Route::get('/admin/users/create', [AdminController::class, 'createUser'])->name('admin.users.create');
Route::post('/admin/users/create', [AdminController::class, 'storeUser'])->name('admin.users.store');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
Route::put('/admin/users/{id}/edit', [AdminController::class, 'updateUser'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');

// Rutas para la administración de Peñas
Route::get('/admin/penyas', [AdminController::class, 'managePenyas'])->name('admin.penyas');
Route::post('/admin/penyas', [AdminController::class, 'storePenyas'])->name('admin.penyas.store');
Route::get('/admin/penyas/create', [AdminController::class, 'create'])->name('admin.penyas.create');
Route::get('/admin/penyas/{id}/edit', [AdminController::class, 'edit'])->name('admin.penyas.edit');
Route::put('/admin/penyas/{id}/update', [AdminController::class, 'updatePenya'])->name('admin.penyas.update');
Route::delete('/admin/penyas/{id}', [AdminController::class, 'deletePenya'])->name('admin.penyas.delete');
Route::get('/admin/penyas/listas',[AdminController::class,'listasPenya'])->name('admin.penyas.listas');
// Ruta para ver las relaciones entre usuarios y peñas
Route::get('/admin/relations', [AdminController::class, 'viewRelations'])->name('admin.relations.index');
Route::get('/admin/relations/edit/{id}', [AdminController::class, 'editRelation'])->name('admin.relations.edit'); // Editar una relación
Route::delete('/admin/relations/delete/{id}', [AdminController::class, 'destroy'])->name('admin.relations.delete');
Route::put('admin/relations/{id}', [AdminController::class, 'updateRelation'])->name('admin.relations.update');


// Admin gestiona solicitudes

Route::get('/admin/requests', [RequestController::class, 'index'])->name('admin.requests');
Route::post('/admin/requests/{id}/accept', [RequestController::class, 'accept'])->name('admin.requests.accept');
Route::post('/admin/requests/{id}/reject', [RequestController::class, 'reject'])->name('admin.requests.reject');






