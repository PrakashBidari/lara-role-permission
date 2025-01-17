<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PremissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Permission Routes
    Route::get('/permissions', [PremissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PremissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PremissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{id}/edit', [PremissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{id}', [PremissionController::class, 'update'])->name('permissions.update');
    Route::delete('/permissions', [PremissionController::class, 'destroy'])->name('permissions.destroy');


    // Roles Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'destroy'])->name('roles.destroy');


     // Article Routes
     Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
     Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
     Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
     Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
     Route::post('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
     Route::delete('/articles', [ArticleController::class, 'destroy'])->name('articles.destroy');


     // Users Routes
     Route::get('/users', [UserController::class, 'index'])->name('users.index');
    //  Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    //  Route::post('/users', [UserController::class, 'store'])->name('users.store');
     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
     Route::post('/users/{id}', [UserController::class, 'update'])->name('users.update');
    //  Route::delete('/users', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
