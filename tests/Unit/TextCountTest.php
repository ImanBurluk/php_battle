<?php

declare(strict_types=1);

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use PHPUnit\Framework\TestCase;

final class TextCountTest extends TestCase
{
    public function testCountDelegatesToCalculator(): void
    {
        // Arrange
        $calculator = $this->createMock(LengthCalculatorInterface::class);
        $calculator->expects($this->once())
            ->method('calculate')
            ->with('hello')
            ->willReturn(5);

        $service = new TextCount($calculator);

        // Act
        $result = $service->count('hello');

        // Assert
        self::assertSame(5, $result);
    }
}
