<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/meus-perfis', [ProfileController::class, 'index'])->middleware('auth');
Route::get('/filmes/busca', [MovieController::class, 'search'])->middleware('auth');
Route::get('/criar-perfil', [ProfileController::class, 'create'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->middleware('auth');
Route::get('/filmes', [MovieController::class, 'index'])->middleware('auth');
Route::get('/filme/{id}', [MovieController::class, 'show'])->middleware('auth');
Route::get('/assistir-depois', [WatchlistController::class, 'show'])->middleware('auth');
Route::post('/watchlists', [WatchlistController::class, 'store'])->middleware('auth');
Route::get('/', [HomeController::class, 'index']);


Auth::routes();
