<?php

use App\Http\Controllers\EstateController;
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

Route::get('/dashboard', [SessionController::class, 'show'])->middleware('auth');
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);

Route::get('/registry', [RegistryController::class, 'create']);
Route::post('/registry', [RegistryController::class, 'store']);
Route::get('/edit', [RegistryController::class, 'edit'])->middleware('auth');
Route::patch('/edit', [RegistryController::class, 'update'])->middleware('auth');
Route::delete('/edit', [RegistryController::class, 'destroy'])->middleware('auth');

Route::get('/estate/buy', [EstateController::class, 'index']);
