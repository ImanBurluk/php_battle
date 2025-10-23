<?php
declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

use Imanburluk\TextCount\Contract\InputInterface;

final class ArgvInput implements InputInterface
{

    /** @var list<string> $argv */
    private array $argv;

    /** @param list<string>|null $argv */
    public function __construct(?array $argv) {
        $this -> argv = $argv;
    }

    public function read(): string
    {
        return (is_array($this->argv) && isset($this->argv[1])) ? (string)$this->argv[1] : '';
    }
}
