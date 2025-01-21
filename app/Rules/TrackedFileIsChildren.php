<?php

namespace App\Rules;

use App\Models\TrackedDirectory;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Lang;

class TrackedFileIsChildren implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $directoryId = request()->input('tracked_directory_id');

        if (!$directoryId) {
            $fail(Lang::get('messages.validation.tracked_directory_not_exist'));
            return;
        }

        $directory = TrackedDirectory::find($directoryId);

        if (!$directory) {
            $fail(Lang::get('messages.validation.tracked_directory_not_exist'));
            return;
        }

        if (!str_starts_with($value, $directory->normalized_path)) {
            $fail(Lang::get('messages.validation.tracked_file_not_a_children'));
        }
    }
}
