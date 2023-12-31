<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\contactController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('contact',[contactController::class, 'create']);
Route::post('contact',[contactController::class, 'store']);
Route::get('/test-contact', function () {
    return new App\Mail\Contact([
      'nom' => 'Durand',
      'email' => 'durand@chezlui.com',
      'message' => 'Je voulais vous dire que votre site est magnifique !'
      ]);//route test mailing
});

Route::get('photo', [PhotoController::class, 'create']);
Route::post('photo', [PhotoController::class, 'store']);