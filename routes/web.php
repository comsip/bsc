<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/flex', function () {
    return view('flex');
});


Auth::routes();

Route::resource('students', StudentController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('questionarios', 'App\Http\Controllers\QuestionarioController');
Route::resource('grupos', 'App\Http\Controllers\GrupoController');
Route::resource('perguntas', 'App\Http\Controllers\PerguntaController');
