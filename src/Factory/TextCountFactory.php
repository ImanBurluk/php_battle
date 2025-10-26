<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Factory;

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;

final class TextCountFactory
{
    public static function createDefault(): TextCount
    {
        return new TextCount(LengthCalculatorFactory::createMb());
    }

    public static function createWithCalculator(LengthCalculatorInterface $calculator): TextCount
    {
        return new TextCount($calculator);
    }
}
