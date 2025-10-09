#!/usr/bin/php7.4
<?php

declare(strict_types=1);

require_once __DIR__ . '/../src/calc.php';
require_once __DIR__ . '/../src/output.php';

$len = consoleCalcLength($_SERVER['argv'] ?? null);
outPrintln((string) $len);
