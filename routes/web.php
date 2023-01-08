<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\AnnonceController;


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

Route::get('/', [AnnonceController::class, 'index'])->name('home');

Route::get('/inscription', [RegisterController::class, 'index'])->name('register');
Route::post('/inscription', [RegisterController::class, 'store']);

Route::get('/connexion', [LoginController::class, 'index'])->name('login');
Route::post('/connexion', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/ajouter-annonce', [AnnonceController::class, 'add'])->name('annonces.add');
Route::get('/posts/{post}', [AnnonceController::class, 'show'])->name('annonces.show');
Route::get('/posts/{post}/editer', [AnnonceController::class, 'edit'])->name('annonces.edit');
Route::post('/posts/{post}/editer', [AnnonceController::class, 'update']);
Route::post('/ajouter-annonce', [AnnonceController::class, 'store']);
Route::delete('/posts/{post}', [AnnonceController::class, 'destroy'])->name('annonce.destroy');