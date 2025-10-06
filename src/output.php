<?php
// Функция вывода данных в output
function out_println(string $s): void {
    fwrite(STDOUT, $s . PHP_EOL);
}