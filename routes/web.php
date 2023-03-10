<?php

use App\Http\Controllers\assetsController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\lvovichController;
use App\Http\Controllers\pazovController;
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

Route::get('/gallery', [galleryController::class, 'index'])->name('gallery');


Route::get('/pazov', [pazovController::class, 'index'])->middleware(['auth'])->name('pazov');
Route::get('/pazov/create', [pazovController::class, 'create'])->middleware(['auth'])->name('pazov.create');
Route::get('/pazov/{pazov}', [pazovController::class, 'show'])->middleware(['auth'])->name('pazov.show');
Route::get('/pazov/{pazov}/edit', [pazovController::class, 'edit'])->middleware(['auth'])->name('pazov.edit');
Route::patch('/pazov/{pazov}', [pazovController::class, 'update'])->middleware(['auth'])->name('pazov.update');
Route::delete('/pazov/{pazov}', [pazovController::class, 'destroy'])->middleware(['auth'])->name('pazov.delete');
Route::post('/pazov', [pazovController::class, 'store'])->middleware(['auth'])->name('pazov.store');

Route::group(['middleware' => 'admin'],function(){
Route::get('/assets', [assetsController::class, 'index'])->middleware(['auth'])->name('assets');
Route::get('/assets/create', [assetsController::class, 'create'])->middleware(['auth'])->name('assets.create');
Route::get('/assets/{assets}', [assetsController::class, 'show'])->middleware(['auth'])->name('assets.show');
Route::get('/assets/{assets}/edit', [assetsController::class, 'edit'])->middleware(['auth'])->name('assets.edit');
Route::patch('/assets/{assets}', [assetsController::class, 'update'])->middleware(['auth'])->name('assets.update');
Route::delete('/assets/{assets}', [assetsController::class, 'destroy'])->middleware(['auth'])->name('assets.delete');
Route::post('/assets', [assetsController::class, 'store'])->middleware(['auth'])->name('assets.store');

Route::get('/lvovich', [lvovichController::class, 'index'])->middleware(['auth'])->name('lvovich');
Route::get('/lvovich/create', [lvovichController::class, 'create'])->middleware(['auth'])->name('lvovich.create');
Route::get('/lvovich/{lvovich}', [lvovichController::class, 'show'])->middleware(['auth'])->name('lvovich.show');
Route::get('/lvovich/{lvovich}/edit', [lvovichController::class, 'edit'])->middleware(['auth'])->name('lvovich.edit');
Route::patch('/lvovich/{lvovich}', [lvovichController::class, 'update'])->middleware(['auth'])->name('lvovich.update');
Route::delete('/lvovich/{lvovich}', [lvovichController::class, 'destroy'])->middleware(['auth'])->name('lvovich.delete');
Route::post('/lvovich', [lvovichController::class, 'store'])->middleware(['auth'])->name('lvovich.store');

Route::get('/platform', [platformController::class, 'index'])->middleware(['auth'])->name('platform');
});
