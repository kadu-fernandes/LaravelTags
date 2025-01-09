<?php

namespace App\Rules;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidDirectory implements ValidationRule
{
    public function validate(string $attribute, mixed $value, callable|Closure $fail): void
    {
        try {
            NormalizedPathHelper::normalizeDirectory($value);
        } catch (InvalidPathException $ex) {
            $fail("The {$attribute} must exist and be a directory.");
        }
    }

}
