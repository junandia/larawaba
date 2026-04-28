# Larawaba: WhatsApp Business Cloud API SDK for Laravel

[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
[![Latest Stable Version](https://img.shields.io/packagist/v/junandia/larawaba.svg)](https://packagist.org/packages/junandia/larawaba)

[English](#english) | [Bahasa Indonesia](#bahasa-indonesia)

---

<a name="english"></a>
## English

**Larawaba** is a lightweight and efficient Laravel SDK for interacting with the **WhatsApp Business Cloud API (Meta)**. Designed for ease of use with auto-discovery features, automatic webhook management, and an event-driven architecture.

### Features
- [x] **Zero Config Webhook**: Automatic verification and webhook handler.
- [x] **Event-Driven**: Uses Laravel Event `MessageReceived` to process incoming messages.
- [x] **Fluent Messaging**: Send text messages with a single line of code.
- [x] **Auto-Discovery**: Automatically registered in your Laravel application.

### Installation
```bash
composer require junandia/larawaba
```

### Configuration
Add your credentials to your `.env` file:
```env
WABA_TOKEN=your-meta-access-token
WABA_PHONE_ID=your-phone-number-id
WABA_VERIFY_TOKEN=your-custom-verify-token
WABA_GRAPH_VERSION=v20.0
```

### Usage
#### 1. Sending Messages
```php
use Junandia\Larawaba\WhatsAppClient;

$wa = app(WhatsAppClient::class);
$wa->sendText('628123456789', 'Hello from Larawaba SDK!');
```

#### 2. Handling Incoming Messages (Listener)
Register the listener in `AppServiceProvider.php`:
```php
use Junandia\Larawaba\Events\MessageReceived;
use App\Listeners\ProcessWhatsAppMessage;
use Illuminate\Support\Facades\Event;

Event::listen(MessageReceived::class, ProcessWhatsAppMessage::class);
```

---

<a name="bahasa-indonesia"></a>
## Bahasa Indonesia

**Larawaba** adalah SDK Laravel yang ringan dan efisien untuk berinteraksi dengan **WhatsApp Business Cloud API (Meta)**. Didesain untuk kemudahan penggunaan dengan fitur *auto-discovery*, manajemen webhook otomatis, dan arsitektur berbasis *event*.

### Fitur Utama
- [x] **Zero Config Webhook**: Verifikasi dan handler webhook otomatis.
- [x] **Event-Driven**: Menggunakan Event Laravel `MessageReceived` untuk memproses pesan masuk.
- [x] **Fluent Messaging**: Kirim pesan teks hanya dengan satu baris kode.
- [x] **Auto-Discovery**: Otomatis terdaftar di aplikasi Laravel Anda.

### Instalasi
```bash
composer require junandia/larawaba
```

### Konfigurasi
Tambahkan kredensial WhatsApp Business Anda ke dalam file `.env`:
```env
WABA_TOKEN=token-akses-meta-anda
WABA_PHONE_ID=id-nomor-telepon-anda
WABA_VERIFY_TOKEN=token-verifikasi-custom-anda
WABA_GRAPH_VERSION=v20.0
```

### Penggunaan
#### 1. Mengirim Pesan
```php
use Junandia\Larawaba\WhatsAppClient;

$wa = app(WhatsAppClient::class);
$wa->sendText('628123456789', 'Halo dari Larawaba SDK!');
```

#### 2. Menangani Pesan Masuk (Listener)
Daftarkan listener di `AppServiceProvider.php`:
```php
use Junandia\Larawaba\Events\MessageReceived;
use App\Listeners\ProcessWhatsAppMessage;
use Illuminate\Support\Facades\Event;

Event::listen(MessageReceived::class, ProcessWhatsAppMessage::class);
```

## License
The MIT License (MIT). See [LICENSE](LICENSE) for more information.