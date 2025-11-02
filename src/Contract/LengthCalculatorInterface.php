<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

interface LengthCalculatorInterface
{
    public function length(string $text): int;
}
