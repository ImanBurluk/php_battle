<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\IO;

use Imanburluk\TextCount\Contract\InputInterface;
use RuntimeException;

final class UrlInput implements InputInterface
{
    public function __construct(string $url, int $timeoutSec = 5)
    {
    }

    public function read(): string
    {
        $ctx = stream_context_create([
            'http' => ['timeout' => $this->timeoutSec, 'user_agent' => 'TextCount/1.0'],
        ]);
        $data = @file_get_contents($this->url, false, $ctx);
        if ($data === false) {
            throw new RuntimeException("Failed to fetch URL: {$this->url}");
        }
        return (string)$data;
    }
}
