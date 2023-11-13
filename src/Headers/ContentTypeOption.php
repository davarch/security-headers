<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum ContentTypeOption: string implements Header
{
    case noSniff = 'nosniff';

    public function headerKey(): string
    {
        return 'X-Content-Type-Options';
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
