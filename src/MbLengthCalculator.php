<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class MbLengthCalculator implements LengthCalculatorInterface
{
    public function __construct(string $encoding = 'UTF-8') {}

    public function length(string $text): int
    {
        return \mb_strlen($text, $this->encoding);
    }
}
