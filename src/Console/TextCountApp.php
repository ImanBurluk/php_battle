<?php
declare(strict_types=1);

namespace Imanburluk\TextCount\Console;

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Contract\InputInterface;
use Imanburluk\TextCount\Contract\OutputInterface;

final class TextCountApp
{
    public function __construct(
        InputInterface $input,
        TextCount $service,
        OutputInterface $output
    ) {}

    public function run(): void
    {
        $text   = $this->input->read();
        $length = $this->service->count($text);
        $this->output->write((string)$length);
    }
}
