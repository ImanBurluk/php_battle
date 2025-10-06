<?php
// Функция для подсчёта длины строки
function str_length(string $s): int {
    if (function_exists('grapheme_strlen')) {
        return grapheme_strlen($s);            // графемы (видимые «символы»)
    }
    if (function_exists('mb_strlen')) {
        return mb_strlen($s, 'UTF-8');         // кодовые точки
    }
    return strlen($s);                         // байты — запасной вариант
}