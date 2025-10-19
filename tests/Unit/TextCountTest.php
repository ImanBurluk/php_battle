<?php
declare(strict_types=1);

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\InputParserInterface;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\OutputInterface;
use PHPUnit\Framework\TestCase;

final class TextCountTest extends TestCase
{
    public function testRunCoordinatesAllParts(): void
    {
        $parser = $this->createMock(InputParserInterface::class);
        $parser->method('parse')->willReturn('abc');

        $calc = $this->createMock(LengthCalculatorInterface::class);
        $calc->method('calculate')->with('abc')->willReturn(3);

        $out = $this->createMock(OutputInterface::class);
        $out->expects(self::once())->method('println')->with('3');

        $app = new TextCount($parser, $calc, $out);
        $app->run(['script.php', 'abc']);
    }
}
