<?php
declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

/**
 * Подсчёт длины строк в символах.
 */
final class LengthCalculator implements LengthCalculatorInterface
{
    public function calculate(string $input): int
    {
        return mb_strlen($input);
    }
}
