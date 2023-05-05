<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

// INICIO DE LAS RUTAS PUBLICAS
// =============================================================================================================================================

Route::get('/', [App\Http\Controllers\PublicController::class, 'home'])->name('home');

// =============================================================================================================================================
// FIN DE LAS RUTAS PUBLICAS



// RUTAS PARA LOS ROLES (Administrador y Invitado)
// =============================================================================================================================================

//Ruta despues de loguearse
Route::get('/afterlogin', [App\Http\Controllers\HomeController::class, 'afterlogin'])->name('afterlogin')->middleware(['auth', 'role:Administrador|Invitado']);

// =============================================================================================================================================
// FIN RUTAS PARA LOS ROLES (Administrador y Invitado)



// RUTAS SEGUN PERMISOS
// =============================================================================================================================================

//Permisos
Route::get('/permiso', [App\Http\Controllers\PermisosController::class, 'index'])->name('permiso_index')->middleware(['auth', 'permission:permiso_index']);
Route::post('/move', [App\Http\Controllers\PermisosController::class, 'move'])->name('permiso_move')->middleware(['auth', 'permission:permiso_move']);

//Roles
Route::prefix("/role")->group(function(){
    Route::get('/', [App\Http\Controllers\RolesController::class, 'index'])->name('role_index')->middleware(['auth', 'permission:role_index']);
    Route::get('/create', [App\Http\Controllers\RolesController::class, 'create'])->name('role_create')->middleware(['auth', 'permission:role_create']);
    Route::post('/', [App\Http\Controllers\RolesController::class, 'store'])->name('role_store')->middleware(['auth', 'permission:role_store']);
    Route::get('/{id}', [App\Http\Controllers\RolesController::class, 'show'])->name('role_show')->middleware(['auth', 'permission:role_show']);
    Route::get('/{id}/edit', [App\Http\Controllers\RolesController::class, 'edit'])->name('role_edit')->middleware(['auth', 'permission:role_edit']);
    Route::put('/{id}', [App\Http\Controllers\RolesController::class, 'update'])->name('role_update')->middleware(['auth', 'permission:role_update']);
    Route::post('/{id}', [App\Http\Controllers\RolesController::class, 'destroy'])->name('role_destroy')->middleware(['auth', 'permission:role_destroy']);
});

Route::post('/movePermisos', [App\Http\Controllers\RolesController::class, 'movePermisos'])->name('role_move_permiso')->middleware(['auth', 'permission:role_move_permiso']);

//Usuarios
Route::prefix("/usuario")->group(function(){
    Route::get('/', [App\Http\Controllers\UsuariosController::class, 'index'])->name('usuario_index')->middleware(['auth', 'permission:usuario_index']);                              //Para el index de usuario
    Route::get('/create', [App\Http\Controllers\UsuariosController::class, 'create'])->name('usuario_create')->middleware(['auth', 'permission:usuario_create']);                     //Para el create de usuario
    Route::post('/', [App\Http\Controllers\UsuariosController::class, 'store'])->name('usuario_store')->middleware(['auth', 'permission:usuario_store']);                             //Para guardar la data del create de usuario
    Route::get('/{id}', [App\Http\Controllers\UsuariosController::class, 'show'])->name('usuario_show')->middleware(['auth', 'permission:usuario_show']);                             //Para el show de usuario
    Route::get('/{id}/edit', [App\Http\Controllers\UsuariosController::class, 'edit'])->name('usuario_edit')->middleware(['auth', 'permission:usuario_edit']);                        //Para el edit de usuario
    Route::put('/{id}', [App\Http\Controllers\UsuariosController::class, 'update'])->name('usuario_update')->middleware(['auth', 'permission:usuario_update']);                       //Para guardar la data del edit de usuario
    Route::post('/estado/{id}', [App\Http\Controllers\UsuariosController::class, 'estado'])->name('usuario_estado')->middleware(['auth', 'permission:usuario_estado']);               //Para el estado del usuario
});

//Dashboard
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware(['auth', 'permission:dashboard']);

//Perfil
Route::prefix("/perfil")->group(function(){
    Route::get('/', [App\Http\Controllers\PerfilController::class, 'show'])->name('perfil_show')->middleware(['auth', 'permission:perfil_show']);;
    Route::post('/editar', [App\Http\Controllers\PerfilController::class, 'edit'])->name('perfil_edit')->middleware(['auth', 'permission:perfil_edit']);;
    Route::post('/editar-pass', [App\Http\Controllers\PerfilController::class, 'editar_contrasena'])->name('perfil_edit_password')->middleware(['auth', 'permission:perfil_edit_password']);;
});

//Auditoria
Route::get('/auditar', [App\Http\Controllers\AuditarController::class, 'index'])->name('auditar_index')->middleware(['auth', 'permission:auditar_index']);
Route::get('/auditar/{id}', [App\Http\Controllers\AuditarController::class, 'show'])->name('auditar_show')->middleware(['auth', 'permission:auditar_show']);

// Error log
Route::prefix("/error_log")->group(function(){
    Route::get('/', [App\Http\Controllers\ErrorLogsController::class, 'index'])->name('error_log_index')->middleware(['auth', 'permission:error_log_index']);                             //Para el index de error logs
    Route::get('/{id}', [App\Http\Controllers\ErrorLogsController::class, 'show'])->name('error_log_show')->middleware(['auth', 'permission:error_log_show']);                            //Para el show de error logs
    Route::post('/crearError/{id}', [App\Http\Controllers\ErrorLogsController::class, 'crearError'])->name('error_log_create')->middleware(['auth', 'permission:error_log_create']);      //Para crear error logs
    Route::post('/estado/{id}', [App\Http\Controllers\ErrorLogsController::class, 'estado'])->name('error_log_estado')->middleware(['auth', 'permission:error_log_estado']);              //Para cambiar el estado del error log
});

//Ejemplos
Route::prefix("/ejemplo")->group(function(){
    Route::get('/', [App\Http\Controllers\EjemplosController::class, 'index'])->name('ejemplo_index')->middleware(['auth', 'permission:ejemplo_index']);                              //Para el index de ejemplo
    Route::get('/create', [App\Http\Controllers\EjemplosController::class, 'create'])->name('ejemplo_create')->middleware(['auth', 'permission:ejemplo_create']);                     //Para el create de ejemplo
    Route::post('/', [App\Http\Controllers\EjemplosController::class, 'store'])->name('ejemplo_store')->middleware(['auth', 'permission:ejemplo_store']);                             //Para guardar la data del create de ejemplo
    Route::get('/{id}', [App\Http\Controllers\EjemplosController::class, 'show'])->name('ejemplo_show')->middleware(['auth', 'permission:ejemplo_show']);                             //Para el show de ejemplo
    Route::get('/{id}/edit', [App\Http\Controllers\EjemplosController::class, 'edit'])->name('ejemplo_edit')->middleware(['auth', 'permission:ejemplo_edit']);                        //Para el edit de ejemplo
    Route::put('/{id}', [App\Http\Controllers\EjemplosController::class, 'update'])->name('ejemplo_update')->middleware(['auth', 'permission:ejemplo_update']);                       //Para guardar la data del edit de ejemplo
    Route::post('/{id}', [App\Http\Controllers\EjemplosController::class, 'destroy'])->name('ejemplo_destroy')->middleware(['auth', 'permission:ejemplo_destroy']);                   //Para el eliminar de ejemplo (eliminado logico)
});

//Procesos en segundo plano
Route::prefix("/queue_control")->group(function(){
    Route::get('/', [App\Http\Controllers\QueueControlController::class, 'index'])->name('queue_control_index')->middleware(['auth', 'permission:queue_control_index']);
    Route::get('/updatePorcentaje', [App\Http\Controllers\QueueControlController::class, 'updatePorcentaje'])->name('queue_control_update_porcentaje')->middleware(['auth', 'permission:queue_control_update_porcentaje']);
});

// =============================================================================================================================================
// FIN RUTAS SEGUN PERMISOS



//=======================  EXAMPLE  =======================
//           ruta URL browser                              actionController        route para invocarla con {{ route('home') }}
//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'home'])->name('home')->middleware('auth');
//=======================   END EXAMPLE  =======================
