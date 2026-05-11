<?php

use App\Http\Controllers\PlaygroundController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlaygroundController::class, 'home'])->name('home');
Route::get('/api-demo', [PlaygroundController::class, 'api'])->name('api.demo');
Route::get('/about', [PlaygroundController::class, 'about'])->name('about');
