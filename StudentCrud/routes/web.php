<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;

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

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/student', [EtudiantController::class, 'index'])->name('etudiant');
Route::get('/student/create', [EtudiantController::class, 'create'])->name('etudiant.create');
Route::post('/student/create', [EtudiantController::class, 'store'])->name('etudiant.ajout');
Route::get('/student/{etudiant}/editer', [EtudiantController::class, 'edit'])->name('etudiant.edit');
Route::put('/etudiant/{etudiant}/update', [EtudiantController::class, 'update'])->name('etudiant.update');
Route::delete('/etudiant/{etudiant}',[EtudiantController::class, 'supprimer'])->name('etudiant.supprimer');
Route::get('/etudiant/{etudiant}/supprimer', [EtudiantController::class,'confirmationSuppression'])->name('etudiant.confirmationSuppression');


