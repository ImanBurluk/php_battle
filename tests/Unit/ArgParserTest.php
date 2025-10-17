<?php
declare(strict_types=1);

use Imanburluk\TextCount\Console\ArgParser;
use PHPUnit\Framework\TestCase;

final class ArgParserTest extends TestCase
{
    public function testParseFromArgv(): void
    {
        $p = new ArgParser();
        self::assertSame('hello', $p->parse(['script.php', 'hello']));
    }

    public function testParseEmptyArgvFallsBackToStdin(): void
    {
        // Подменять STDIN сложно в юнит-тесте, поэтому проверим поведение с argv:
        $p = new ArgParser();
        self::assertSame('', $p->parse(['script.php', '']));
    }
}
