#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Imanburluk\TextCount\MbLengthCalculator;
use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Console\ArgvInput;
use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\IO\ConsoleOutput;

$app = new TextCountApp(
    new ArgvInput($argv),
    new TextCount(new MbLengthCalculator()),
    new ConsoleOutput()
);
$app->run();
