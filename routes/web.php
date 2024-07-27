<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::get('/{parameter}/edit', [PagesController::class, 'edit'])->name('edit');
Route::post('/{parameter}', [PagesController::class, 'update'])->name('update');
