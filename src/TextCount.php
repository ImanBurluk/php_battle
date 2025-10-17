<?php
declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Console\ArgParser;
use Imanburluk\TextCount\Console\Output;

final class TextCount
{
    private ArgParser $parser;
    private LengthCalculator $calculator;
    private Output $output;

    public function __construct(
        ArgParser $parser,
        LengthCalculator $calculator,
        Output $output
    ) {
        $this->parser = $parser;
        $this->calculator = $calculator;
        $this->output = $output;
    }

    /**
     * @param list<string>|null $argv
     */
    public function run(?array $argv): void
    {
        $input  = $this->parser->parse($argv);
        $length = $this->calculator->calculate($input);
        $this->output->println((string) $length);
    }
}
