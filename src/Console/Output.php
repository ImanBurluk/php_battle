<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

class Output
{
    public function println(string $s): void
    {
        fwrite(STDOUT, $s . PHP_EOL);
    }
}
