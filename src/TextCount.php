<?php

declare(strict_types=1);

namespace Imanburluk\TextCount;

use Imanburluk\TextCount\Contract\InputParserInterface;
use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\OutputInterface;

/**
 * Координатор: получает вход, считает длину, выводит результат.
 */
final class TextCount
{
    private InputParserInterface $parser;
    private LengthCalculatorInterface $calculator;
    private OutputInterface $output;

    public function __construct(
        InputParserInterface $parser,
        LengthCalculatorInterface $calculator,
        OutputInterface $output
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
