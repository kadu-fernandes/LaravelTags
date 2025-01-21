<?php

namespace App\Helpers;

use App\Exceptions\InvalidPathException;

class NormalizedPathHelper
{
    public const VALID_EXTENSIONS = [
        'doc' => 'fa-solid fa-file-word',
        'docx' => 'fa-solid fa-file-word',
        'md' => 'fa-regular fa-file-lines',
        'odp' => 'fa-regular fa-file-powerpoint',
        'odt' => 'fa-regular fa-file-word',
        'ppt' => 'fa-solid fa-file-powerpoint',
        'pptx' => 'fa-solid fa-file-powerpoint',
        'csv' => 'fa-solid fa-file-csv',
        'rtf' => 'fa-solid fa-file-invoice',
        'tex' => 'fa-regular fa-file-lines',
        'txt' => 'fa-solid fa-file-lines',
        'xls' => 'fa-solid fa-file-excel',
        'xlsx' => 'fa-solid fa-file-excel',
        'pdf' => 'fa-solid fa-file-pdf',
    ];

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

    public static function getExtension(string $path): string
    {
        try {
            $pathInfo = pathinfo(static::normalizeFile($path));

            return $pathInfo['extension'];
        } catch (InvalidPathException $ex) {
            return '';
        }
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

    /**
     * @throws InvalidPathException
     */
    public static function assertExtension(string $path): void
    {
        static::assertIsFile($path);
        $pathInfo = pathinfo(trim($path));
        $extension = $pathInfo['extension'];

        if (!ctype_lower($extension) || !preg_match('/[a-z]/', $extension)) {
            throw new InvalidPathException('The file extension must be in lower case!');
        }

        if (!in_array($extension, array_keys(static::VALID_EXTENSIONS))) {
            throw new InvalidPathException('The file extension is not allowed!');
        }
    }
}
