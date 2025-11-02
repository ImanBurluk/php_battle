<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Contract;

interface TextCountFactoryInterface
{
    /**
     * Абстрактная фабрика создаёт калькулятор длины под заданную кодировку.
     */
    public function createLengthCalculator(?string $encoding = null): LengthCalculatorInterface;
}
