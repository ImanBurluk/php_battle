<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Factory;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\LengthCalculator;
use Imanburluk\TextCount\MbLengthCalculator;

final class TextCountFactory extends BaseTextCountFactory
{
    protected function createAsciiCalculator(): LengthCalculatorInterface
    {
        return new LengthCalculator();
    }

    protected function createMbCalculator(?string $encoding = null): LengthCalculatorInterface
    {
        return new MbLengthCalculator($encoding ?? 'UTF-8');
    }
}
