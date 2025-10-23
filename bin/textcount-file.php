#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Imanburluk\TextCount\MbLengthCalculator;
use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\IO\FileInput;
use Imanburluk\TextCount\IO\FileOutput;

$in  = $argv[1] ?? 'input.txt';
$out = $argv[2] ?? 'length.txt';

$app = new TextCountApp(
    new FileInput($in),
    new TextCount(new MbLengthCalculator()),
    new FileOutput($out)
);
$app->run();
