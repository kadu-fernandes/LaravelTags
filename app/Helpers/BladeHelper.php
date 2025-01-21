<?php

namespace App\Helpers;

class BladeHelper
{
    public static function lastFolders(?string $path): string
    {
        if (null === $path) {
            return '';
        }

        $folders = explode(DIRECTORY_SEPARATOR, trim($path, DIRECTORY_SEPARATOR));

        return implode(DIRECTORY_SEPARATOR, array_slice($folders, -2));
    }

    public static function iconForFile(?string $filePath): string
    {
        $extension = NormalizedPathHelper::getExtension($filePath);
        if (null === $icon = NormalizedPathHelper::VALID_EXTENSIONS[strtolower(trim($extension))] ?? null) {
            $icon = 'fa-solid fa-file';
        }

        return '<i class="' . $icon . '"></i>&nbsp;';
    }
}
