<?php
declare(strict_types=1);

use Imanburluk\TextCount\IO\FileInput;
use PHPUnit\Framework\TestCase;

final class FileInputTest extends TestCase
{
    /** @var string */
    private $tmp;

    protected function setUp(): void
    {
        $this->tmp = tempnam(sys_get_temp_dir(), 'tc_');
        file_put_contents($this->tmp, "hello");
    }

    protected function tearDown(): void
    {
        if (is_file($this->tmp)) {
            @unlink($this->tmp);
        }
    }

    public function testReadReturnsFileContents(): void
    {
        // Arrange
        $in = new FileInput($this->tmp);

        // Act
        $text = $in->read();

        // Assert
        self::assertSame('hello', $text);
    }
}
