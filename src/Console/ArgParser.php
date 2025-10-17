<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

class ArgParser
{
    /**
     * @param list<string>|null $argv  Аргументы командной строки: позиционный список строк
     */
    public function parse(?array $argv): string
    {
        if (is_array($argv) && isset($argv[1])) {
            return (string) $argv[1];
        }

        $input = stream_get_contents(STDIN);
        return rtrim((string) $input, "\r\n");
    }
}
