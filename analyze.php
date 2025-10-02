<?php
declare(strict_types=1);

$args = $_SERVER['argv'];
array_shift($args); // убрать имя скрипта

$input = count($args) > 0 ? $args[0] : stream_get_contents(STDIN);

// Уберём перевод строки в конце, если ввели из терминала/pipe
$input = rtrim((string)$input, "\r\n");

// Считаем длину максимально корректно для Юникода
if (function_exists('grapheme_strlen')) {
    // Требует расширение intl; считает графемные кластеры (видимые символы)
    $len = grapheme_strlen($input);
} elseif (function_exists('mb_strlen')) {
    // Требует расширение mbstring; считает кодовые точки (символы)
    mb_internal_encoding('UTF-8');
    $len = mb_strlen($input);
} else {
    // Байтовая длина (как запасной вариант)
    $len = strlen($input);
}

fwrite(STDOUT, (string)$len . PHP_EOL);
