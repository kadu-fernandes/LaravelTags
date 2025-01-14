<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

readonly class UniqueNormalizedPath implements ValidationRule
{
    public function __construct(
        private string $table = 'tracked_directories',
        private string $column = 'normalized_path',
        private ?int $ignoreId = null
    ) {
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $query = DB::table($this->table)
            ->whereRaw("LOWER({$this->column}) = LOWER(?)", [$value]);

        if ($this->ignoreId) {
            $query->where('id', '!=', $this->ignoreId);
        }

        if ($query->exists()) {
            $fail("A normalized path with value '{$value}' already exist in the database.");
        }
    }
}
