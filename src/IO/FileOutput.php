<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\IO;

use Imanburluk\TextCount\Contract\OutputInterface;
use RuntimeException;

final class FileOutput implements OutputInterface
{
    /** @var string */
    private $path;

    /** @var bool */
    private $append;

    public function __construct(string $path, bool $append = false)
    {
        $this->path   = $path;
        $this->append = $append;
    }

    public function write(string $line): void
    {
        $flags = $this->append ? FILE_APPEND : 0;
        $ok = @file_put_contents($this->path, $line . PHP_EOL, $flags);
        if ($ok === false) {
            throw new RuntimeException("Failed to write file: {$this->path}");
        }
    }
}
