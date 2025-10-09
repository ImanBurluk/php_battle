<?php

declare(strict_types=1);

require_once __DIR__ . '/args.php';
require_once __DIR__ . '/length.php';

/**
 * Подсчитать длину строки, переданной в консоль.
 */
function consoleCalcLength(?array $argv): int
{
    $input = consoleParseArg($argv);

    return strLength($input);
}
