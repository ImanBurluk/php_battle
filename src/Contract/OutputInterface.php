<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

interface OutputInterface
{
    public function write(string $line): void;
}
