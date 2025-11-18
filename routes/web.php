<?php

use App\Http\Controllers\ContactController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::controller(ContactController::class)->group(function (): void {
    Route::get('/contact/messages', 'index')->name('contact.messages');
    Route::get('/', 'create')->name('contact.create');
    Route::get('/contact', 'create');
    Route::post('/contact', 'store')
        ->withoutMiddleware([VerifyCsrfToken::class])
        ->name('contact.store');
});
