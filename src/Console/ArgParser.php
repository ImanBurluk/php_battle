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
        // 1) Есть второй аргумент командной строки — используем его
        if (is_array($argv) && isset($argv[1]) && $argv[1] !== '') {
            return (string) $argv[1];
        }

        // 2) Пробуем прочитать STDIN ТОЛЬКО если он готов к чтению прямо сейчас
        if (\defined('STDIN')) {
            $read = [STDIN];
            $write = $except = [];

            // 0 секунд, 0 мкс — неблокирующая проверка
            $ready = @\stream_select($read, $write, $except, 0, 0);

            if ($ready === false) {
                // В некоторых окружениях select может быть недоступен — не читаем
                return '';
            }

            if ($ready > 0) {
                $data = \stream_get_contents(STDIN);
                return \rtrim((string) $data, "\r\n");
            }
        }

        // 3) Ничего осмысленного не пришло — пустая строка
        return '';
    }
}
