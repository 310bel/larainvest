<?php

use App\Http\Controllers\lvovichController;
use App\Http\Controllers\platformController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('/dashboard', [dashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/lvovich', [lvovichController::class, 'index'])->middleware(['auth'])->name('lvovich');
Route::get('/lvovich/create', [lvovichController::class, 'create'])->middleware(['auth'])->name('lvovich.create');
Route::get('/lvovich/{lvovich}', [lvovichController::class, 'show'])->middleware(['auth'])->name('lvovich.show');
Route::get('/lvovich/{lvovich}/edit', [lvovichController::class, 'edit'])->middleware(['auth'])->name('lvovich.edit');
Route::patch('/lvovich/{lvovich}', [lvovichController::class, 'update'])->middleware(['auth'])->name('lvovich.update');
Route::delete('/lvovich/{lvovich}', [lvovichController::class, 'destroy'])->middleware(['auth'])->name('lvovich.delete');

Route::post('/lvovich', [lvovichController::class, 'store'])->middleware(['auth'])->name('lvovich.store');


Route::get('/platform', [platformController::class, 'index'])->middleware(['auth'])->name('platform');
