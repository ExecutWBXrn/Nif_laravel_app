<?php

use App\Http\Controllers\EstateController;
use App\Http\Controllers\FavoritePivotModelController;
use App\Http\Controllers\RegistryController;
use App\Http\Controllers\SessionController;
use App\Models\Estate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $estates = Estate::with('user')->orderBy('created_at', 'desc')->paginate(16);
    return view('welcome', ['estates' => $estates]);
});


Route::get('/about', function () {
    return view('about');
});
Route::get('/policy', function () {
    return view('policy');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/dashboard/{user_id}', [SessionController::class, 'show']);
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);

Route::get('/registry', [RegistryController::class, 'create']);
Route::post('/registry', [RegistryController::class, 'store']);
Route::get('/edit', [RegistryController::class, 'edit'])->middleware('auth');
Route::patch('/edit', [RegistryController::class, 'update'])->middleware('auth');
Route::delete('/edit', [RegistryController::class, 'destroy'])->middleware('auth');

Route::get('/estate', [EstateController::class, 'index1'])->middleware('auth');
Route::get('/estate/buyNIF', [EstateController::class, 'index']);
Route::get('/estate/rentNIF', [EstateController::class, 'index2']);
Route::get('/estate/addNIF', [EstateController::class, 'create'])->middleware('auth');
Route::post('/estate/addNIF', [EstateController::class, 'store'])->middleware('auth');
Route::get('/estate/show/{estate}', [EstateController::class, 'show'])->name('estate.show');
Route::get('/estate/edit/{estate}', [EstateController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'estate');
Route::patch('/estate/{estate}', [EstateController::class, 'update'])
    ->name('estate.update')
    ->middleware('auth')
    ->can('edit', 'estate');
Route::delete('/estate/{estate}', [EstateController::class, 'destroy'])
    ->name('estate.destroy')
    ->middleware('auth')
    ->can('edit', 'estate');

Route::get('/favorite', [FavoritePivotModelController::class, 'index'])
    ->name('favorite')
    ->middleware('auth');
Route::post('/estate/{estate}', [FavoritePivotModelController::class, 'store'])
    ->name('estate.fav')
    ->middleware('auth');
Route::delete('/favorite/{favorite}', [FavoritePivotModelController::class, 'destroy'])
    ->name('estate.fav.destroy')
    ->middleware('auth');
