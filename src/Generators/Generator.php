<?php

declare(strict_types=1);

namespace Davarch\SecurityHeaders\Generators;

use Davarch\SecurityHeaders\Headers\Header;
use Davarch\SecurityHeaders\Headers\HeaderToRemove;
use Davarch\SecurityHeaders\Keywords\Keyword;

abstract class Generator
{
    /**
     * @var array<string, string>
     */
    protected array $addingHeaders = [];

    /**
     * @var array<int, string>
     */
    protected array $removingHeaders = [];

    abstract public function configure(): void;

    public function addHeader(Header $header): self
    {
        $value = $this->addingHeaders[$header->headerKey()] ?? '';
        $value = $value ? explode($header->delimiter(), $value) : [];
        $value[] = $header->getValue();

        $this->addingHeaders[$header->headerKey()] = implode($header->delimiter(), $value);

        return $this;
    }

    public function removeHeader(HeaderToRemove $header): self
    {
        $this->removingHeaders[] = $header->getValue();

        return $this;
    }

    public function addHeaderWithDirective(Header $header, Keyword $keyword, string $urls = null): self
    {
        $value = $this->addingHeaders[$header->headerKey()] ?? null;
        $value = $value ? explode($header->delimiter(), $value) : [];
        $value[] = $header->getValue().'=('.$keyword->value.$urls.')';

        $this->addingHeaders[$header->headerKey()] = implode($header->delimiter(), $value);

        return $this;
    }

    /**
     * @return array<string, string>
     */
    public function getAddingHeaders(): array
    {
        return $this->addingHeaders;
    }

    /**
     * @return array<int, string>
     */
    public function getRemovingHeaders(): array
    {
        return $this->removingHeaders;
    }
}
