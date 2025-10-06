<?php
require_once __DIR__ . '/args.php';
require_once __DIR__ . '/length.php';

// Функция подсчёта длины строки, переданной в консоль
function console_calc_length(?array $argv): int {
    $input = console_parse_arg($argv);
    return str_length($input);
}