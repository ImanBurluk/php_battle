<?php

declare(strict_types=1);

/**
 * Подсчитать длину строки -> кодовые точки (mb_strlen)
 *
 */
function strLength(string $stringIn): int
{
        return mb_strlen($stringIn, 'UTF-8');
}
