<?php

use Illuminate\Support\Facades\Route;
use Junandia\Larawaba\Http\Controllers\WebhookController;

// Kita bungkus dengan middleware 'api' agar otomatis bypass CSRF
Route::prefix('api/whatsapp')
    ->middleware('api') 
    ->group(function () {
        Route::get('webhook', [WebhookController::class, 'verify']);
        Route::post('webhook', [WebhookController::class, 'handle']);
    });