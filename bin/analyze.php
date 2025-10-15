#!/usr/bin/php7.4
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$len = consoleCalcLength($_SERVER['argv'] ?? null);
outPrintln((string) $len);
