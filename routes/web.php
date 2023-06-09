<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RespostaController;
use App\Http\Controllers\QuestionarioController;

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

Route::get('/respostas/{questionario_id}', [RespostaController::class, 'mostraPergunta'])->name('respostas');



Auth::routes();

Route::resource('students', StudentController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('questionarios', 'App\Http\Controllers\QuestionarioController');
Route::resource('grupos', 'App\Http\Controllers\GrupoController');
Route::resource('perguntas', 'App\Http\Controllers\PerguntaController');
Route::resource('cards', 'App\Http\Controllers\CardController');
Route::resource('respostas', 'App\Http\Controllers\RespostaController');
Route::resource('participantes', 'App\Http\Controllers\ParticipanteController');
Route::get('/questionario/{questionario_id}/grupo/{grupo_id}/pergunta/{pergunta_id}/proximo', [QuestionarioController::class, 'proximo'])->name('questionario.pergunta.proximo');
