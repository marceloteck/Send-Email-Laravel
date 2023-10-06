<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailProController;
use App\Http\Controllers\AdminController;

Route::get('/', [SendEmailProController::class, 'index'])->name('index');
Route::get('/edit', [SendEmailProController::class, 'editEmail'])->name('editingEmail');
Route::get('/viewEmail', [SendEmailProController::class, 'viewEmail'])->name('viewEmail');
Route::post('/edit', [SendEmailProController::class, 'SendEmail'])->name('SendEmail');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('index.admin');
});


require __DIR__ . '/breeze.php';
require __DIR__ . '/auth.php';