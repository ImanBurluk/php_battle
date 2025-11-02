<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\TextCountFactoryInterface;
use Imanburluk\TextCount\Factory\TextCountFactory;

final class TextCount
{
    private static ?TextCountFactoryInterface $factory = null;

    public static function setFactory(TextCountFactoryInterface $factory): void
    {
        self::$factory = $factory;
    }

    public static function len(string $text, ?string $encoding = null): int
    {
        $factory = self::$factory ?? new TextCountFactory();
        $calculator = $factory->createLengthCalculator($encoding);

        return self::safeLength($calculator, $text);
    }

    public static function count(string $text, ?string $encoding = null): int
    {
        // BC-алиас
        return self::len($text, $encoding);
    }

    private static function safeLength(LengthCalculatorInterface $calculator, string $text): int
    {
        // Надёжно работает и со старыми реализациями
        if (\method_exists($calculator, 'calculate')) {
            return $calculator->calculate($text);
        }

        // fallback для BC
        return $calculator->length($text);
    }

}
