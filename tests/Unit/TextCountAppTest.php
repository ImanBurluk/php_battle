<?php
declare(strict_types=1);

use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\InputInterface;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\OutputInterface;
use PHPUnit\Framework\TestCase;

final class TextCountAppTest extends TestCase
{
    public function testRunCoordinatesInputServiceAndOutput(): void
    {
        // Arrange
        $input = $this->createMock(InputInterface::class);
        $input->method('read')->willReturn('hello');

        $calc = $this->createMock(LengthCalculatorInterface::class);
        $calc->method('calculate')->with('hello')->willReturn(5);

        $output = $this->createMock(OutputInterface::class);
        $output->expects($this->once())->method('write')->with('5');

        $service = new TextCount($calc);
        $app = new TextCountApp($input, $service, $output);

        // Act
        $app->run();

        // Assert — ожидание уже описано в моках
        $this->addToAssertionCount(1);
    }
}
