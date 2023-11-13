<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Headers;

interface Header
{
    public function headerKey(): string;

    public function getValue(): string;

    /**
     * @return non-empty-string
     */
    public function delimiter(): string;
}
