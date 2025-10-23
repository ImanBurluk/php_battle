<?php
declare(strict_types=1);

use Imanburluk\TextCount\IO\FileOutput;
use PHPUnit\Framework\TestCase;

final class FileOutputTest extends TestCase
{
    /** @var string */
    private $tmp;

    protected function setUp(): void
    {
        $this->tmp = tempnam(sys_get_temp_dir(), 'tc_');
        // очистим файл
        file_put_contents($this->tmp, '');
    }

    protected function tearDown(): void
    {
        if (is_file($this->tmp)) {
            @unlink($this->tmp);
        }
    }

    public function testWriteSavesLineWithNewline(): void
    {
        // Arrange
        $out = new FileOutput($this->tmp);

        // Act
        $out->write('5');

        // Assert (читаем и сверяем целиком)
        self::assertSame("5\n", file_get_contents($this->tmp));
    }
}
