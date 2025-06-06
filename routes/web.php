<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\LoginController;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');


Route::resource('tarefas', TarefaController::class);

//Route::get('/login', [LoginController::class, 'index'])->name('login');

require __DIR__.'/settings.php';
