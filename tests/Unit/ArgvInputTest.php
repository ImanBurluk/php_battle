<?php
declare(strict_types=1);

use Imanburluk\TextCount\Console\ArgvInput;
use PHPUnit\Framework\TestCase;

final class ArgvInputTest extends TestCase
{
    /**
     * @dataProvider argvCases
     */
    public function testRead(?array $argv, string $expected): void
    {
        // Arrange
        $input = new ArgvInput($argv);

        // Act
        $actual = $input->read();

        // Assert
        self::assertSame($expected, $actual);
    }

    public function argvCases(): array
    {
        return [
            'no args'          => [null, ''],
            'only script name' => [['bin/textcount.php'], ''],
            'with text'        => [['bin/textcount.php', 'hello'], 'hello'],
        ];
    }
}
