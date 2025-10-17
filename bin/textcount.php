#!/usr/bin/env php
<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\LengthCalculator;
use Imanburluk\TextCount\Console\ArgParser;
use Imanburluk\TextCount\Console\Output;

$parser      = new ArgParser();
$calculator  = new LengthCalculator();
$output      = new Output();

$app = new TextCount($parser, $calculator, $output);
$app->run($argv);
