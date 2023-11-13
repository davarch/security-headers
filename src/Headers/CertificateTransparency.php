<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum CertificateTransparency: string implements Header
{
    case reportUri = 'report-uri';
    case enforce = 'enforce';
    case maxAge = 'max-age';

    public function headerKey(): string
    {
        return 'Expect-CT';
    }

    public function getValue(): string
    {
        return match ($this) {
            self::reportUri => self::reportUri->value.'='.config('security-headers.certificate-transparency.report-uri'),
            self::maxAge => self::maxAge->value.'='.config('security-headers.certificate-transparency.max-age'),
            default => $this->value,
        };
    }

    public function delimiter(): string
    {
        return ', ';
    }
}
