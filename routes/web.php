<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::get('/home', [dashboardController::class, 'index']);
