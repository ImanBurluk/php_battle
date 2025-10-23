<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class TextCount
{
    private LengthCalculatorInterface $calculator;

    public function __construct(LengthCalculatorInterface $calculator)
    {
        $this->calculator = $calculator;
    }

    public function count(string $text): int
    {
        return $this->calculator->calculate($text);
    }
}
