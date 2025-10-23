<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\IO;

use Imanburluk\TextCount\Contract\InputInterface;
use RuntimeException;

final class UrlInput implements InputInterface
{
    /** @var string */
    private $url;

    /** @var int */
    private $timeoutSec;

    public function __construct(string $url, int $timeoutSec = 5)
    {
        $this->url = $url;
        $this->timeoutSec = $timeoutSec;
    }

    public function read(): string
    {
        $context = stream_context_create([
            'http' => [
                'timeout'    => $this->timeoutSec,
                'user_agent' => 'TextCount/1.0',
            ],
        ]);

        $data = @file_get_contents($this->url, false, $context);
        if ($data === false) {
            throw new RuntimeException("Failed to fetch URL: {$this->url}");
        }

        return (string) $data;
    }
}
