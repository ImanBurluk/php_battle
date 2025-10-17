<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

/**
 * Выводит строку в целевой вывод (консоль, лог и т.д.).
 */
interface OutputInterface
{
    public function println(string $line): void;
}
