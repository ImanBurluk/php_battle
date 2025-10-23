<?php

declare(strict_types=1);

use Imanburluk\TextCount\MbLengthCalculator;
use PHPUnit\Framework\TestCase;

final class LengthCalculatorTest extends TestCase
{
    /** @var MbLengthCalculator */
    private $calc;

    protected function setUp(): void
    {
        $this->calc = new MbLengthCalculator();
    }

    /**
     * @dataProvider textCases
     */
    public function testCalculate(string $input, int $expected): void
    {
        // Arrange done in setUp + provider

        // Act
        $len = $this->calc->calculate($input);

        // Assert (один ассерт)
        self::assertSame($expected, $len);
    }

    public function textCases(): array
    {
        return [
            'empty'         => ['', 0],
            'ascii'         => ['abc', 3],
            'multibyte'     => ['йо', 2],
            'with spaces'   => ['a b', 3],
            'emoji'         => ['👍', 1],
        ];
    }
}
