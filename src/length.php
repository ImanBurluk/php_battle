<?php

declare(strict_types=1);

/**
 * Подсчитать длину строки -> кодовые точки (mb_strlen)
 *
 */
function strLength(string $s): int
{
        return mb_strlen($s, 'UTF-8');
}
