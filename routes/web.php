<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DemandeAchatController;
use App\Http\Controllers\DevisController;
use App\Http\Controllers\FournisseurController;
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

// fetch all clients
Route::get('fetchclients', [ClientController::class, 'fetchAll'])->name('clients.fetchAll')->middleware('auth');

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

/********************************** Articles **********************************/

// All Articles
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index')->middleware('auth');

// All Articles in stock
Route::get('articlesinstock', [ArticleController::class, 'fetchAllInStock'])->name('articles.articlesInStock')->middleware('auth');

// All Articles frequently used
Route::get('articlesfrequent', [ArticleController::class, 'fetchAllFrequent'])->name('articles.articlesFrequent')->middleware('auth');

// Create Article
Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create')->middleware('auth');

// Show Edit Form
Route::get('articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit')->middleware('auth');

// Update Article
Route::put('articles/{article}', [ArticleController::class, 'update'])->name('articles.update')->middleware('auth');

// Delete Article
Route::delete('articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy')->middleware('auth');

// Store Article
Route::post('storearticles', [ArticleController::class, 'store'])->name('articles.store')->middleware('auth');

/********************************** Demande d'achat **********************************/

// All DemandeAchats
Route::get('demandeachats', [DemandeAchatController::class, 'index'])->name('demandeachats.index')->middleware('auth');

// Create DemandeAchats
Route::get('demandeachats/create', [DemandeAchatController::class, 'create'])->name('demandeachats.create')->middleware('auth');

// Show Edit Form
Route::get('demandeachats/{demandeachat}/edit', [DemandeAchatController::class, 'edit'])->name('demandeachats.edit')->middleware('auth');

// Update DemandeAchats
Route::put('demandeachats/{demandeachat}', [DemandeAchatController::class, 'update'])->name('demandeachats.update')->middleware('auth');

// Delete DemandeAchats
Route::delete('demandeachats/{demandeachat}', [DemandeAchatController::class, 'destroy'])->name('demandeachats.destroy')->middleware('auth');

// Store DemandeAchats
Route::post('storedemandeachats', [DemandeAchatController::class, 'store'])->name('demandeachats.store')->middleware('auth');

// generate PDF
Route::get('demandeachats/{demandeachat}/pdf', [DemandeAchatController::class, 'pdf'])->name('demandeachats.pdf')->middleware('auth');

/**************************************** Devis ****************************************/

// All devis
Route::get('devis', [DevisController::class, 'index'])->name('devis.index')->middleware('auth');

// Create devis
Route::get('devis/create', [DevisController::class, 'create'])->name('devis.create')->middleware('auth');

// Show Edit Form
Route::get('devis/{devis}/edit', [DevisController::class, 'edit'])->name('devis.edit')->middleware('auth');

// Update devis
Route::put('devis/{devis}', [DevisController::class, 'update'])->name('devis.update')->middleware('auth');

// Delete devis
Route::delete('devis/{devis}', [DevisController::class, 'destroy'])->name('devis.destroy')->middleware('auth');

// Store devis
Route::post('storedevis', [DevisController::class, 'store'])->name('devis.store')->middleware('auth');

// generate PDF
Route::get('devis/{devis}/pdf', [DevisController::class, 'pdf'])->name('devis.pdf')->middleware('auth');

/********************************** Bon de livraison **********************************/

// // All bonlivraison
// Route::get('bonlivraisons', [BonlivraisonController::class, 'index'])->name('bonlivraisons.index')->middleware('auth');

// // Create bonlivraison
// Route::get('bonlivraisons/create', [BonlivraisonController::class, 'create'])->name('bonlivraisons.create')->middleware('auth');

// // Show Edit Form
// Route::get('bonlivraisons/{bonlivraison}/edit', [BonlivraisonController::class, 'edit'])->name('bonlivraisons.edit')->middleware('auth');