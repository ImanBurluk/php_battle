<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Console\ArgParser;
use Imanburluk\TextCount\Console\Output;

class TextCount
{
    /**
     * @param list<string>|null $argv
     */
    public function run(?array $argv): void
    {
        $parser = new ArgParser();
        $calculator = new LengthCalculator();
        $output = new Output();

        $input = $parser->parse($argv);
        $length = $calculator->calculate($input);
        $output->println((string) $length);
    }
}
