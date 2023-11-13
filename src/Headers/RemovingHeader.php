<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

enum RemovingHeader: string implements HeaderToRemove
{
    case xPoweredBy = 'X-Powered-By';
    case server = 'Server';

    public function getValue(): string
    {
        return $this->value;
    }
}
