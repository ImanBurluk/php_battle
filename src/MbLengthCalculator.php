<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class MbLengthCalculator implements LengthCalculatorInterface
{
    /** @var string */
    private $encoding;

    public function __construct(string $encoding = 'UTF-8')
    {
        $this->encoding = $encoding;
    }

    public function calculate(string $text): int
    {
        return \mb_strlen($text, $this->encoding);
    }

    public function length(string $text): int
    {
        return $this->calculate($text);
    }
}
