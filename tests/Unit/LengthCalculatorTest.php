<?php
declare(strict_types=1);

use Imanburluk\TextCount\LengthCalculator;
use PHPUnit\Framework\TestCase;

final class LengthCalculatorTest extends TestCase
{
    public function testCalculate(): void
    {
        $calc = new LengthCalculator();
        self::assertSame(0, $calc->calculate(''));
        self::assertSame(3, $calc->calculate('abc'));
        self::assertSame(2, $calc->calculate('йо')); // проверка mb_strlen
    }
}
