<?php

declare(strict_types=1);

use Davarch\SecurityHeaders\Generators\Basic;

return [
    'enabled' => env('SECURITY_HEADERS_ENABLED', true),

    'generator' => Basic::class,

    'strict-transport-security' => [
        'max-age' => 31536000,
    ],

    'certificate-transparency' => [
        'max-age' => 30,
        'report-uri' => env('APP_URL'),
    ],
];
