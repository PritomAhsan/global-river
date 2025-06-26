<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/submission-form', [App\Http\Controllers\HomeController::class, 'form'])->name('submission-form');
Route::post('/submission-form', [App\Http\Controllers\HomeController::class, 'formAction'])->name('submission-form-action');
