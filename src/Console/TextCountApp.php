<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\InputInterface;
use Imanburluk\TextCount\Contract\OutputInterface;

final class TextCountApp
{
    /** @var InputInterface */
    private $input;

    /** @var TextCount */
    private $service;

    /** @var OutputInterface */
    private $output;

    public function __construct(InputInterface $input, TextCount $service, OutputInterface $output)
    {
        $this->input   = $input;
        $this->service = $service;
        $this->output  = $output;
    }

    public function run(): void
    {
        $text   = $this->input->read();
        $length = $this->service->count($text);
        $this->output->write((string) $length);
    }
}
