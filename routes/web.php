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
Route::get('/lvovich/create', [lvovichController::class, 'create'])->middleware(['auth']);

Route::post('/lvovich', [lvovichController::class, 'store'])->middleware(['auth'])->name('lvovich.store');


Route::get('/platform', [platformController::class, 'index'])->middleware(['auth'])->name('platform');
