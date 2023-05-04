<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
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

/********************************** Clients **********************************/

// All Clients
Route::get('clients', [ClientController::class, 'index'])->name('clients.index')->middleware('auth');

// Create Client
Route::get('clients/create', [ClientController::class, 'create'])->name('clients.create')->middleware('auth');

// Single Client
Route::get('clients/{client}', [ClientController::class, 'show'])->name('clients.show')->middleware('auth');

// Show Edit Form
Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit')->middleware('auth');

// Update Client
Route::put('clients/{client}', [ClientController::class, 'update'])->name('clients.update')->middleware('auth');

// Delete Client
Route::delete('clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy')->middleware('auth');

// Store Client
Route::post('storeclients', [ClientController::class, 'store'])->name('clients.store')->middleware('auth');

/********************************** Users **********************************/

// Register Form
Route::get('register', [UserController::class, 'create'])->name('users.create');

// Store User
Route::post('users', [UserController::class, 'store'])->name('users.store');

// User Login Form
Route::get('login', [UserController::class, 'login'])->name('login')->middleware('guest');

// User Authentification
Route::post('users/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

// Logout
Route::post('logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
