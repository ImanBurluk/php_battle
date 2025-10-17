<?php
declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

use Imanburluk\TextCount\Contract\InputParserInterface;

/**
 * Реализация парсера CLI-аргументов.
 */
final class ArgParser implements InputParserInterface
{
    /**
     * @param list<string>|null $argv
     */
    public function parse(?array $argv): string
    {
        if (is_array($argv) && isset($argv[1]) && $argv[1] !== '') {
            return (string) $argv[1];
        }

        $input = stream_get_contents(STDIN);
        return rtrim((string) $input, "\r\n");
    }
}
