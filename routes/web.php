<?php

use App\Http\Controllers\ClientController;
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

// All Clients
Route::get('/clients', [ClientController::class, 'index']);

// Single Client
Route::get('/clients/{client}', [ClientController::class, 'show']);

// Show Edit Form
Route::get('/clients/{client}/edit', [ClientController::class, 'edit']);

// Update Client
Route::put('/clients/{client}', [ClientController::class, 'update']);