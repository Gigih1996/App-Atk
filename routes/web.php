<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KabinetController;
use App\Http\Controllers\DepartementController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::get('roles/destroy/{id}', [RoleController::class, 'destroy'])->name('roles_destroy');

    Route::resource('users', UserController::class);
    Route::get('users/destroy/{id}', [UserController::class, 'destroy'])->name('users_destroy');
});

//CRUD KABINET
Route::resource('kabinet', KabinetController::class);
Route::get('kabinet/destroy/{id}', [KabinetController::class, 'destroy'])->name('kabinet_destroy');

//DEPARTEMENT
Route::resource('departement', DepartementController::class);
Route::put('departement/update', [DepartementController::class, 'update'])->name('departement_update');
Route::delete('departement/destroy', [DepartementController::class, 'destroy'])->name('departement_destroy');



// //SETTING
// Route::resource('media_arsip', MediaArsipController::class);
// Route::resource('jenis_arsip', JenisArsipController::class);
// Route::resource('status', StatusFileController::class);

// Route::get('jenis_arsip/destroy/{id}', [JenisArsipController::class, 'destroy'])->name('jenis_arsip_destroy');
// Route::get('media_arsip/destroy/{id}', [MediaArsipController::class, 'destroy'])->name('media_destroy');
// Route::get('status/destroy/{id}', [StatusFileController::class, 'destroy'])->name('status_destroy');
