<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum ReferrerPolicy: string implements Header
{
    case noReferrer = 'no-referrer';
    case noReferrerWhenDowngrade = 'no-referrer-when-downgrade';
    case origin = 'origin';
    case originWhenCrossOrigin = 'origin-when-cross-origin';
    case sameOrigin = 'same-origin';
    case strictOrigin = 'strict-origin';
    case strictOriginWhenCrossOrigin = 'strict-origin-when-cross-origin';
    case unsafeUrl = 'unsafe-url';

    public function headerKey(): string
    {
        return 'Referrer-Policy';
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function delimiter(): string
    {
        return ' ';
    }
}
