<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SendEmailProController;
use App\Http\Controllers\AdminController;
use Inertia\Inertia;

Route::get('/', [SendEmailProController::class, 'index'])->name('index');
Route::get('/edit', [SendEmailProController::class, 'editEmail'])->name('editingEmail');
Route::get('/viewEmail', [SendEmailProController::class, 'viewEmail'])->name('viewEmail');
Route::post('/edit', [SendEmailProController::class, 'SendEmail'])->name('SendEmail');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('index.admin');
    Route::get('/new-email', [AdminController::class, 'newEmail'])->name('index.newEmail');
    Route::get('/modelo-email', [AdminController::class, 'modeloEmail'])->name('index.modeloEmail');
    Route::get('/new-modelo-email', [AdminController::class, 'newModeloEmail'])->name('index.newModeloEmail');
    Route::post('/new-modelo-email', [AdminController::class, 'postModeloEmail'])->name('index.postModeloEmail');
});

// Route::get('/teste', function () {
//     return Inertia::render('components/Forms/vue-tags-input');
// })->name('index.modeloEmail');

require __DIR__ . '/breeze.php';
require __DIR__ . '/auth.php';