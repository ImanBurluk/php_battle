<?php

declare(strict_types=1);

/**
 * Подсчитать длину строки, переданной в консоль.
 */
function consoleCalcLength(?array $argv): int
{
    $input = consoleParseArg($argv);

    return strLength($input);
}
