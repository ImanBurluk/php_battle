<?php

declare(strict_types=1);

namespace Imanburluk\TextCount\Factory;

use Imanburluk\TextCount\Contract\InputInterface;
use Imanburluk\TextCount\Contract\OutputInterface;
use Imanburluk\TextCount\IO\FileInput;
use Imanburluk\TextCount\IO\FileOutput;
use Imanburluk\TextCount\IO\UrlInput;

final class FileFactory
{
    public static function createFileInput(string $path): InputInterface
    {
        return new FileInput($path);
    }

    public static function createUrlInput(string $url, int $timeoutSec = 10): InputInterface
    {
        return new UrlInput($url, $timeoutSec);
    }

    public static function createFileOutput(string $path, bool $append = false): OutputInterface
    {
        return new FileOutput($path, $append);
    }
}
