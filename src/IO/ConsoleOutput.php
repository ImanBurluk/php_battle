<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\IO;

use Imanburluk\TextCount\Contract\OutputInterface;

final class ConsoleOutput implements OutputInterface
{
    public function write(string $line): void
    {
        echo $line, PHP_EOL;
    }
}
