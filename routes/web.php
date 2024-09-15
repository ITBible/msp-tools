<?php

use App\Http\Controllers\PasteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::domain(config('domains.paste'))->name('paste.')->group(function () {
    Route::resource('/', PasteController::class)->only(['index', 'store']);
});

Route::name('admin.')->group(function () {
    Route::resource('/pastes', \App\Http\Controllers\Dashboard\PasteController::class)
        ->except(['create', 'store', 'edit', 'update']);
    Route::get('/', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
})->middleware('auth:sanctum', config('jetstream.auth_session'), 'verified');
