<?php

namespace Junandia\Larawaba\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Junandia\Larawaba\WhatsAppClient;
use Illuminate\Support\Facades\Log;
use Junandia\Larawaba\Events\MessageReceived;

class WebhookController extends Controller
{
    public function __construct(
        protected WhatsAppClient $client
    ) {}

    /**
     * GET: Verifikasi Webhook oleh Meta
     */
    public function verify(Request $request)
    {
        $mode = $request->query('hub_mode');
        $token = $request->query('hub_verify_token');
        $challenge = $request->query('hub_challenge');

        // Gunakan token dari config atau env sebagai pembanding
        $secret = config('whatsapp.verify_token') ?? env('WABA_VERIFY_TOKEN');

        if ($mode === 'subscribe' && $token === $secret) {
            return response($challenge, 200);
        }

        return response('Forbidden', 403);
    }

    /**
     * POST: Menerima Data dari Meta
     */
    public function handle(Request $request)
    {
        $payload = $request->all();

        if ($this->isMessage($payload)) {
            // Melempar event ke sistem Laravel
            event(new MessageReceived($payload));
        }

        return response('EVENT_RECEIVED', 200);
    }

    /**
     * Cek apakah payload berisi pesan
     */
    protected function isMessage(array $payload): bool
    {
        return isset($payload['entry'][0]['changes'][0]['value']['messages']);
    }

}