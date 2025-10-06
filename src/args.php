<?php
// Функция на разбор параметров командной строки
function console_parse_arg(?array $argv): string {
    if (is_array($argv) && isset($argv[1])) {
        return (string)$argv[1];
    }
    $in = stream_get_contents(STDIN);
    return rtrim((string)$in, "\r\n");
}