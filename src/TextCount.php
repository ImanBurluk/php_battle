<?php

// src/TextCount.php
declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class TextCount
{
    public function __construct(private LengthCalculatorInterface $calculator) {}

    public function count(string $text): int
    {
        return $this->calculator->calculate($text);
    }
}
