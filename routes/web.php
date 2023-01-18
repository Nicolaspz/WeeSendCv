<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/candidatura', [App\Http\Controllers\HomeController::class, 'abrirCandidatura'])->name('candidato.candidatura');
Route::get('/perfil/{id}', [App\Http\Controllers\HomeController::class, 'abrirperfil'])->name('candidato.perfil');
Route::put('/update/{id}', [App\Http\Controllers\CandidatoController::class, 'update'])->name('update');
Route::post('/ad_expe/{id}', [App\Http\Controllers\CandidatoController::class, 'expeperienciaAdd'])->name('candidato.experiencia');
