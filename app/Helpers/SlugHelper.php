<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class SlugHelper
{
    public static function slugify(string $value): string
    {
        $value = Str::slug(Str::lower(trim($value)));

        return preg_replace('/-+/', '-', $value);
    }
}
