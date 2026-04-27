<?php
    return [
        'api_token' => env('WABA_TOKEN'),
        'phone_number_id' => env('WABA_PHONE_ID'),
        'verify_token' => env('WABA_VERIFY_TOKEN'), // Untuk Webhook
        'version' => env('WABA_GRAPH_VERSION'),
    ];
?>