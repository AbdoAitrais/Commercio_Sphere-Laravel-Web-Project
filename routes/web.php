<?php

use App\Http\Controllers\AchatarticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VentearticleController;
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

/********************************** Fournisseurs **********************************/

// All Fournisseurs
Route::get('fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index')->middleware('auth');

// Create Fournisseur
Route::get('fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create')->middleware('auth');

// Single Fournisseur
Route::get('fournisseurs/{fournisseur}', [FournisseurController::class, 'show'])->name('fournisseurs.show')->middleware('auth');

// Show Edit Form
Route::get('fournisseurs/{fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit')->middleware('auth');

// Update Fournisseur
Route::put('fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update')->middleware('auth');

// Delete Fournisseur
Route::delete('fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy')->middleware('auth');

// Store Fournisseur
Route::post('storefournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store')->middleware('auth');

/********************************** Articles d'achat **********************************/

// All Articles d'achat
Route::get('achatarticles', [AchatarticleController::class, 'index'])->name('achatarticles.index')->middleware('auth');

// Create Article d'achat
Route::get('achatarticles/create', [AchatarticleController::class, 'create'])->name('achatarticles.create')->middleware('auth');

// Show Edit Form
Route::get('achatarticles/{achatarticle}/edit', [AchatarticleController::class, 'edit'])->name('achatarticles.edit')->middleware('auth');

// Update Article d'achat
Route::put('achatarticles/{achatarticle}', [AchatarticleController::class, 'update'])->name('achatarticles.update')->middleware('auth');

// Delete Article d'achat
Route::delete('achatarticles/{achatarticle}', [AchatarticleController::class, 'destroy'])->name('achatarticles.destroy')->middleware('auth');

// Store Article d'achat
Route::post('storeachatarticles', [AchatarticleController::class, 'store'])->name('achatarticles.store')->middleware('auth');

/********************************** Articles de vente **********************************/

// All Articles de vente
Route::get('ventearticles', [VentearticleController::class, 'index'])->name('ventearticles.index')->middleware('auth');

// Create Article de vente
Route::get('ventearticles/create', [VentearticleController::class, 'create'])->name('ventearticles.create')->middleware('auth');

// Show Edit Form
Route::get('ventearticles/{ventearticle}/edit', [VentearticleController::class, 'edit'])->name('ventearticles.edit')->middleware('auth');

// Update Article de vente
Route::put('ventearticles/{ventearticle}', [VentearticleController::class, 'update'])->name('ventearticles.update')->middleware('auth');

// Delete Article de vente
Route::delete('ventearticles/{ventearticle}', [VentearticleController::class, 'destroy'])->name('ventearticles.destroy')->middleware('auth');

// Store Article de vente
Route::post('storeventearticles', [VentearticleController::class, 'store'])->name('ventearticles.store')->middleware('auth');