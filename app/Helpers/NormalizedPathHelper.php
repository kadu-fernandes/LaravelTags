<?php

namespace App\Helpers;

use App\Exceptions\InvalidPathException;

class NormalizedPathHelper
{
    /**
     * @throws InvalidPathException
     */
    public static function normalizeDirectory(string $path): string
    {
        $path = static::expandPath($path);
        self::assertIsDirectory($path);

        return $path;
    }

    /**
     * @throws InvalidPathException
     */
    public static function normalizeFile(string $path): string
    {
        $path = static::expandPath($path);
        self::assertIsFile($path);

        return $path;
    }

    /**
     * @throws InvalidPathException
     */
    public static function expandPath(string $path): string
    {
        static::assertIsNotLink($path);

        $path = trim($path);
        if (str_starts_with($path, '~')) {
            $path = str_replace('~', env('HOME'), $path);
        }

        if (!$path = realpath($path)) {
            throw new InvalidPathException('The path does not exist!');
        }

        return $path;
    }

    /**
     * @throws InvalidPathException
     */
    public static function assertIsNotLink(string $path): void
    {
        if (is_link($path)) {
            throw new InvalidPathException('Symbolic links are not accepted!');
        }
    }

    /**
     * @throws InvalidPathException
     */
    public static function assertIsDirectory(string $path): void
    {
        if (!is_dir($path)) {
            throw new InvalidPathException('The path is not a directory!');
        }
    }

    /**
     * @throws InvalidPathException
     */
    public static function assertIsFile(string $path): void
    {
        if (!is_file($path)) {
            throw new InvalidPathException('The path is not a file!');
        }
    }
}
