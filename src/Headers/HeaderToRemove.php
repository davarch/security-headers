<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

interface HeaderToRemove
{
    public function getValue(): string;
}
