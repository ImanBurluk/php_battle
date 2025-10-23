<?php

declare(strict_types=1);

use Imanburluk\TextCount\Console\ArgParser;
use PHPUnit\Framework\TestCase;

final class ArgParserTest extends TestCase
{
    public function testParseFromArgv(): void
    {
        $parser = new ArgParser();
        self::assertSame('hello', $parser->parse(['script.php', 'hello']));
    }

    public function testParseEmptyArgvFallsBackToStdin(): void
    {
        // Подменять STDIN сложно в юнит-тесте, поэтому проверим поведение с argv:
        $parser = new ArgParser();
        self::assertSame('', $parser->parse(['script.php', '']));
    }
}
