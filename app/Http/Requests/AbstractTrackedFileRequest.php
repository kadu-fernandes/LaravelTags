<?php

namespace App\Http\Requests;

use App\Rules\TrackedFileIsChildren;
use App\Rules\ValidExtension;
use App\Rules\ValidFile;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AbstractTrackedFileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'normalized_path' => [
                'required',
                'string',
                'max:512',
                'unique:tracked_files',
                new TrackedFileIsChildren($this->input('tracked_directory_id')),
                new ValidFile(),
                new ValidExtension(),
            ],
            'tracked_directory_id' => 'required|exists:tracked_directories,id',
        ];
    }
}
