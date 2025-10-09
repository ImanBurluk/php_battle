<?php

declare(strict_types=1);

/**
 * Напечатать строку с переводом строки.
 */
function outPrintln(string $s): void
{
    fwrite(STDOUT, $s . PHP_EOL);
}
