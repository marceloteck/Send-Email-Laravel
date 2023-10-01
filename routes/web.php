<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () { return Inertia::render('Pages/email/editEmail'); });

require __DIR__.'/breeze.php';
require __DIR__.'/auth.php';
