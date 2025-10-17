<?php
declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

/**
 * Парсит входные аргументы CLI в строку входа.
 */
interface InputParserInterface
{
    /**
     * @param list<string>|null $argv
     */
    public function parse(?array $argv): string;
}
