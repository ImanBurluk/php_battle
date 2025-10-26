<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Factory;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\LengthCalculator;
use Imanburluk\TextCount\MbLengthCalculator;

final class LengthCalculatorFactory
{
    public static function createMb(): LengthCalculatorInterface
    {
        return new MbLengthCalculator();
    }

    public static function createDefault(): LengthCalculatorInterface
    {
        // если захотите переключить реализацию — меняете только здесь
        return new LengthCalculator();
    }
}
