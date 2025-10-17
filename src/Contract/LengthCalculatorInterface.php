<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

/**
 * Считает длину входной строки.
 */
interface LengthCalculatorInterface
{
    public function calculate(string $input): int;
}
