<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\TextCountFactoryInterface;
use Imanburluk\TextCount\Factory\TextCountFactory;

final class TextCount
{
    private static ?TextCountFactoryInterface $factory = null;

    /**
     * Позволяем DI/тестам подменять фабрику.
     */
    public static function setFactory(TextCountFactoryInterface $factory): void
    {
        self::$factory = $factory;
    }

    /**
     * Главный public API: получить длину строки.
     *
     * @param string      $text
     * @param string|null $encoding null → авто (mb если доступно)
     */
    public static function len(string $text, ?string $encoding = null): int
    {
        $factory = self::$factory ?? new TextCountFactory();

        $calculator = $factory->createLengthCalculator($encoding);

        return self::safeLength($calculator, $text);
    }

    private static function safeLength(LengthCalculatorInterface $calculator, string $text): int
    {
        // Здесь можно централизованно ловить исключения и нормализовывать ошибки.
        return $calculator->length($text);
    }
}
