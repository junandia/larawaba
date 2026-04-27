<?php
namespace Junandia\Larawaba;

use Illuminate\Support\Facades\Http;
use Exception;

class WhatsAppClient
{
    protected string $baseUrl = "https://graph.facebook.com";

    public function __construct(
        protected string $token,
        protected string $phoneId,
        protected string $version
    ){}

    /**
     * TAHAP 1: Validasi Webhook (Verification Request)
     * Meta send GET request to your URL for Verification.
     */
    public function verifyWebhook(string $token, string $challenge)
    {
        $expectedToken = config('whatsapp.verify_token');

        if ($token === $expectedToken) {
            return $challenge;
        }

        throw new Exception("Webhook verification failed: Token mismatch.");
    }

     /**
     * Send Simple Text
     */
    public function sendText(string $to, string $message)
    {
        $url = "{$this->baseUrl}/{$this->version}/{$this->phoneId}/messages";

        $response = Http::withToken($this->token)
            ->post($url, [
                'messaging_product' => 'whatsapp',
                'to' => $to,
                'type' => 'text',
                'text' => ['body' => $message]
            ]);

        if ($response->failed()) {
            throw new Exception("WhatsApp API Error: " . $response->body());
        }

        return $response->json();
    }
}