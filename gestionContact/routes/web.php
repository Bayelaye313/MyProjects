<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::controller(ContactController::class)->group(function () {

    Route::get('/', 'index')->name('contact.index');
    Route::get('/contact/create', 'create')->name('contact.create');
    Route::get('/contact/{id}', 'show');
    Route::get('/contact/{id}/edit', 'edit');
    Route::post('/contact', 'store');
    Route::patch('/contact/{id}', 'update');
    Route::delete('/contact/{id}', 'destroy');

});