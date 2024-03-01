<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskSecController;

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


Route::get('/', [TaskController::class, 'index'])->name('index')->middleware('auth');

Route::resource('/task', TaskSecController::class);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login/post', [AuthController::class, 'login'])->name('login.post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/tache/creer', [TaskController::class, 'create'])->name('create');
// Route::post('/tache/creer-post', [TaskController::class, 'store'])->name('store');
// Route::get('/tache/modifier/{id}', [TaskController::class, 'edit'])->name('edit');
// Route::put('/tache/update/{id}', [TaskController::class, 'update'])->name('update');
// Route::delete('/tache/supprimer/{id}', [TaskController::class, 'destroy'])->name('destroy');
