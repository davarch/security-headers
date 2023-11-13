<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum StrictTransportSecurity: string implements Header
{
    case maxAge = 'max-age';
    case includeSubDomains = 'includeSubDomains';
    case preload = 'preload';

    public function headerKey(): string
    {
        return 'Strict-Transport-Security';
    }

    public function getValue(): string
    {
        return match ($this) {
            self::maxAge => self::maxAge->value.'='.config('security-headers.strict-transport-security.max-age'),
            default => $this->value,
        };
    }

    public function delimiter(): string
    {
        return '; ';
    }
}
