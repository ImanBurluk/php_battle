<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\IO;

use Imanburluk\TextCount\Contract\InputInterface;
use RuntimeException;

final class FileInput implements InputInterface
{
    /** @var string */
    private $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }

    public function read(): string
    {
        if (!is_file($this->path) || !is_readable($this->path)) {
            throw new RuntimeException("File not readable: {$this->path}");
        }
        $data = file_get_contents($this->path);
        if ($data === false) {
            throw new RuntimeException("Failed to read file: {$this->path}");
        }
        return (string) $data;
    }
}
