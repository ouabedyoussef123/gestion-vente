<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\AuthController;

// Routes publiques (login)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route de déconnexion (auth requise)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Routes protégées par authentification
Route::middleware('auth')->group(function () {
    // Page d'accueil redirige vers la liste des produits
    Route::get('/', function () {
        return redirect()->route('produits.index');
    });

    Route::resource('produits', ProduitController::class);
    Route::resource('ventes', VenteController::class);
});
