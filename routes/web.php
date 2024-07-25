<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/create', [PagesController::class, 'create'])->name('create');
Route::post('/create', [PagesController::class, 'store'])->name('store');

Route::delete('/{parameter}', [PagesController::class, 'imageDelete'])->name('image.delete');

