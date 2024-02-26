<?php

use App\Http\Controllers\JobController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AplicationController;
use App\Http\Controllers\Dash\AdminController;
use App\Http\Controllers\Dash\DashController;
use App\Http\Controllers\Dash\ProfileController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\PublicProfileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


////////////////// PÁGINAS //////////////////

// Home
Route::get('/', function () { return view('app.home'); })->name('home');

// Búsqueda de empleo
Route::get('/busqueda',[JobController::class,'index'])->name('jobs');


// Detalle de anuncio
Route::get('/busqueda/{url}', [JobController::class, 'show'] )->name('jobs.show');


// Planes de suscripción
Route::get('/planes',  [PageController::class, 'pricing']  )->name('membership_info');

// Perfil Candidatos y empresas
Route::get('/perfil/candidato/{url}', [PublicProfileController::class, 'showWorker'])->name('profiles.worker');
// Perfil Empresas
Route::get('/perfil/{url}', [PublicProfileController::class, 'showCompany'] )->name('profiles.company');

// Contacto
Route::get('/contact', function () { return view('app.contact'); })->name('contact');

// Términos y Condiciones
Route::get('/contact', function () { return view('app.terms'); })->name('terms');

// API para la búsqueda de places
Route::get('/lugares/api', [PlacesController::class, 'api'])->name('places.api');

/*******************************************************************************************
 * Rutas para USUARIOS autenticados
 *******************************************************************************************/
Route::middleware('auth')->group(function () {

    // Dash principal
    Route::get('/dash', [DashController::class, 'index'])->name('dash');
    Route::post('/dash/perfil', [ProfileController::class, 'store'])->name('dash.profile.store');

    Route::middleware('role:--company')->group(function(){
        // Anuncios (Jobs)
        Route::get('/dash/anuncios', function () { return view('dash.jobs.index'); })->name('dash.jobs');
        Route::get('/dash/anuncios/crear', [JobController::class, 'create'])->name('dash.jobs.create');
        Route::post('/dash/anuncios/crear', [JobController::class, 'store'])->name('dash.create.jobs');
        Route::get('/dash/anuncios/{id}/editar', function () { return view('dash.jobs.edit'); })->name('dash.jobs.edit');
        Route::post('/dash/anuncios-js', [JobController::class, 'jobsJS'] )->name('dash.jobsJS');
    });


    Route::middleware('role:--worker')->group(function(){
        // rutas de trabajadores Ej. VER APLICACIONES
        Route::get('/dash/aplicaciones', [AplicationController::class, 'index'] )->name('dash.aplications');
        Route::post('/dash/aplicaciones', [AplicationController::class, 'store'] )->name('dash.aplications.store');
        Route::post('/dash/aplicaciones-js', [AplicationController::class, 'aplicationsJS'] )->name('dash.aplicationsJS');
    });

    Route::middleware('role:--worker,--company')->group(function(){
        // no pueden entrar user comun, sin elección de rol

        // Perfil
        Route::get('/dash/perfil', [ProfileController::class, 'edit'])->name('dash.profile');
        // Route::post('/dash/perfil', [ProfileController::class, 'store'])->name('dash.profile.store'); también pueden acceder users sin clasificar

        Route::get('/dash/perfil/planes', function () { return view('dash.profile.membership'); })->name('dash.profile.membership');
        Route::get('/dash/perfil/planes/confirmar', function () { return view('dash.profile.checkout'); })->name('dash.profile.checkout');

        // Feedbacks
        Route::get('/dash/feedbacks', function () { return view('dash.feedbacks'); })->name('dash.feedbacks');

    });


    /*******************************************************************************************
     * Rutas para ADMIN
     *******************************************************************************************/
    Route::middleware('role:admin')->group(function(){

        Route::get('/admin/usuarios', function () { return view('admin.users.index'); })->name('admin.users');
        Route::post('/admin/usuarios-js', [UserController::class, 'usersJS'])->name('admin.usersJS');
        Route::get('/admin/usuarios/crear', function () { return view('admin.users.edit'); })->name('admin.users.edit');


        Route::get('/admin/anuncios', [AdminController::class, 'jobs'])->name('admin.jobs');
        Route::post('/admin/anuncios-js', [AdminController::class, 'jobsJS'])->name('admin.jobsJS');

        Route::get('/admin/aplicaciones', [AdminController::class, 'aplications'])->name('admin.aplications');
        Route::post('/admin/aplicaciones-js', [AdminController::class, 'aplicationsJS'])->name('admin.aplicationsJS');

    });


});


// sacar:
// Route::post('/register',[UserController::class , 'store'])->name('register');



 

// Fortify routes
require __DIR__.'/fortify.php';
