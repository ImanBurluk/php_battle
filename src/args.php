<?php

declare(strict_types=1);

/**
 * Разбор аргумента из командной строки или STDIN.
 */
function consoleParseArg(?array $argv): string
{
    if (is_array($argv) && isset($argv[1])) {
        return (string) $argv[1];
    }

    $in = stream_get_contents(STDIN);

    return rtrim((string) $in, "\r\n");
}
