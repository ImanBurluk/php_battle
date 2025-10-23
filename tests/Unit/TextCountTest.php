<?php

declare(strict_types=1);

use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\InputInterface;
use Imanburluk\TextCount\Contract\OutputInterface;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use PHPUnit\Framework\TestCase;

final class TextCountTest extends TestCase
{
    public function testRunCoordinatesAllParts(): void
    {
        // arrange
        $input = $this->createMock(InputInterface::class);
        $input->method('read')->willReturn('hello');

        $calculator = $this->createMock(LengthCalculatorInterface::class);
        $calculator->method('calculate')->with('hello')->willReturn(5);

        $output = $this->createMock(OutputInterface::class);
        $output->expects($this->once())
            ->method('write')
            ->with('5');

        $service = new TextCount($calculator);
        $app = new TextCountApp($input, $service, $output);

        // act
        $app->run();

        // assert — проверки уже заданы в моках
        $this->addToAssertionCount(1);
    }
}
