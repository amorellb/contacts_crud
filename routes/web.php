<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('contacts', \App\Http\Controllers\ContactController::class)
    ->middleware('auth');
// Si fuese necesario, añadir ->parameters(['parameter' => 'altParam']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/set_language/{lang}',
    [App\Http\Controllers\Controller::class, 'set_language'])->name('set_language');

require __DIR__ . '/auth.php';
