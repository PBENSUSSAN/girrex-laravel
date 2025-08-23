<?php

use App\Http\Controllers\CentreController;
use App\Http\Controllers\AgentController;
use Illuminate\Support\Facades\Route;

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

// C'est la route par défaut de Laravel, on peut la laisser.
Route::get('/', function () {
    return view('welcome');
});


// C'est la nouvelle route que nous ajoutons.
Route::get('/centres', [CentreController::class, 'index'])->name('centres.index');
Route::get('/agents', [AgentController::class, 'index'])->name('agents.index');
// Affiche le formulaire de création
Route::get('/centres/creer', [CentreController::class, 'create'])->name('centres.create');

// Traite la soumission du formulaire
Route::post('/centres', [CentreController::class, 'store'])->name('centres.store');