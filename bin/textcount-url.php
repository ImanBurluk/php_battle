#!/usr/bin/env php
<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use Imanburluk\TextCount\MbLengthCalculator;
use Imanburluk\TextCount\TextCount;
use Imanburluk\TextCount\Console\TextCountApp;
use Imanburluk\TextCount\IO\UrlInput;
use Imanburluk\TextCount\IO\FileOutput;

$url = $argv[1] ?? 'https://loripsum.net/api/plaintext';
$out = $argv[2] ?? 'url_length.txt';

$app = new TextCountApp(
    new UrlInput($url),
    new TextCount(new MbLengthCalculator()),
    new FileOutput($out)
);
$app->run();
