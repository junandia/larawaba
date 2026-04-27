# Larawaba: Simple WhatsApp Business Cloud API SDK for Laravel

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A fluent and lightweight Laravel wrapper for the **WhatsApp Business Cloud API (Meta)**. This package allows you to send messages and validate webhooks with ease.

## Features

- [x] Webhook Verification Helper
- [x] Send Text Messages
- [ ] Send Media Messages (Coming Soon)
- [ ] Template Management (Coming Soon)

## Installation

Since this package is in early development, you can install it via a local path repository. Add this to your Laravel project's `composer.json`:

```json
"repositories": [
    {
        "type": "path",
        "url": "../path-to-your-folder/larawaba"
    }
],
"require": {
    "junandia/larawaba": "dev-main"
}
```

Then run:
```bash
composer update junandia/larawaba
```

## Setup

Add your credentials to your `.env` file:

```env
WABA_TOKEN=your-temp-or-permanent-token
WABA_PHONE_ID=your-phone-number-id
WABA_VERIFY_TOKEN=your-custom-verify-token
```

## Usage

### 1. Webhook Verification
Use this in your controller to handle the initial "Challenge" from Meta.

```php
use Junandia\Larawaba\WhatsAppClient;

public function verify(Request $request) {
    $sdk = new WhatsAppClient(env('WABA_TOKEN'), env('WABA_PHONE_ID'));
    
    return $sdk->verifyWebhook(
        $request->query('hub_verify_token'),
        $request->query('hub_challenge')
    );
}
```

### 2. Sending a Text Message
```php
$sdk = new WhatsAppClient(env('WABA_TOKEN'), env('WABA_PHONE_ID'));

$sdk->sendText('628123456789', 'Hello from Larawaba!');
```

## Contributing

Contributions are welcome! If you find a bug or want to add a feature, feel free to open an issue or submit a pull request.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.