<?php
namespace Junandia\Larawaba;

use Illuminate\Support\ServiceProvider;

class LarawabaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Pastikan file routes/api.php benar-benar ada di luar folder src
        $path = __DIR__.'/../routes/api.php';
        
        if (file_exists($path)) {
            $this->loadRoutesFrom($path);
        } else {
            // Ini untuk debugging: jika file tidak ketemu, akan muncul di log
            \Log::error("File rute SDK tidak ditemukan di: " . $path);
        }
    }

    public function register()
    {
        // Mendaftarkan class utama ke container
        $this->app->singleton(WhatsAppClient::class, function ($app) {
            return new WhatsAppClient(
                config('whatsapp.api_token') ?? env('WABA_TOKEN'),
                config('whatsapp.phone_number_id') ?? env('WABA_PHONE_ID'),
                config('whatsapp.version') ?? env('WABA_GRAPH_VERSION')
            );
        });
    }
}