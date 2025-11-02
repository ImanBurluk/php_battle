<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Factory;

use Imanburluk\TextCount\Contract\LengthCalculatorInterface;
use Imanburluk\TextCount\Contract\TextCountFactoryInterface;

abstract class BaseTextCountFactory implements TextCountFactoryInterface
{
    final public function createLengthCalculator(?string $encoding = null): LengthCalculatorInterface
    {
        $encoding = $encoding ? \strtoupper($encoding) : null;

        if ($this->shouldUseMb($encoding)) {
            return $this->createMbCalculator($encoding); // фабричный метод
        }

        return $this->createAsciiCalculator(); // фабричный метод
    }

    protected function shouldUseMb(?string $encoding): bool
    {
        // UTF-* → MB
        if ($encoding && \strpos($encoding, 'UTF') === 0) {
            return true;
        }

        // 2) Если доступно mbstring — безопаснее по умолчанию использовать его
        return \function_exists('mb_strlen');
    }

    /**
     * Фабричный метод: создать ASCII-калькулятор.
     */
    abstract protected function createAsciiCalculator(): LengthCalculatorInterface;

    /**
     * Фабричный метод: создать MB-калькулятор.
     */
    abstract protected function createMbCalculator(?string $encoding = null): LengthCalculatorInterface;
}
