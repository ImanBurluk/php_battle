<?php
declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

use Imanburluk\TextCount\Contract\OutputInterface;

/**
 * Вывод в STDOUT построчно.
 */
final class Output implements OutputInterface
{
    public function println(string $line): void
    {
        fwrite(STDOUT, $line . PHP_EOL);
    }
}
