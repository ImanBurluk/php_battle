<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

/**
 * Выводит строку в целевой вывод (консоль, лог и т.д.).
 */
interface OutputInterface
{
    /** Записывает строку в приёмник (консоль/файл/и т.д.) */
    public function write(string $line): void;
}
