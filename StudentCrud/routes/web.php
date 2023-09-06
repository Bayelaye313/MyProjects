<?php

use App\Http\Controllers\ContactController;
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

Route::controller(EtudiantController::class)->group(function(){
Route::get('/student', 'index')->name('etudiant');
Route::get('/student/create' ,'create')->name('etudiant.create');
Route::post('/student/create',  'store')->name('etudiant.ajout');
Route::get('/student/{etudiant}/editer', 'edit')->name('etudiant.edit');
Route::put('/etudiant/{etudiant}/update', 'update')->name('etudiant.update');
Route::delete('/etudiant/{etudiant}', 'supprimer')->name('etudiant.supprimer');
Route::get('/etudiant/{etudiant}/supprimer','confirmationSuppression')->name('etudiant.confirmationSuppression');
});

