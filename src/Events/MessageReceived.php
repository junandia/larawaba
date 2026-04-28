<?php

namespace Junandia\Larawaba\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageReceived
{
    use Dispatchable, SerializesModels;

    /**
     * Data payload lengkap dari WhatsApp
     */
    public array $payload;
    public string $from;
    public string $message;

    public function __construct(array $payload)
    {
        $this->payload = $payload;
        
        // Helper untuk memudahkan user mengambil data umum
        $value = $payload['entry'][0]['changes'][0]['value'];
        $this->from = $value['metadata']['display_phone_number'] ?? '';
        $this->message = $value['messages'][0]['text']['body'] ?? '';
    }
}