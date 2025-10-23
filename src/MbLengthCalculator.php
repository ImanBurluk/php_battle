<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class MbLengthCalculator implements LengthCalculatorInterface
{
    public function calculate(string $text): int
    {
        return mb_strlen($text);
    }
}
