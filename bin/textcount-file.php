#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\Factory\FileFactory;
use Imanburluk\TextCount\Factory\TextCountFactory;

$in  = $argv[1] ?? 'input.txt';
$out = $argv[2] ?? 'length.txt';

$app = new TextCountApp(
    FileFactory::createFileInput($in),
    TextCountFactory::createDefault(),
    FileFactory::createFileOutput($out)
);

$app->run();
