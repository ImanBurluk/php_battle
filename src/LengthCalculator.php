<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

class LengthCalculator
{
    public function calculate(string $string): int
    {
        return mb_strlen($string, 'UTF-8');
    }
}
