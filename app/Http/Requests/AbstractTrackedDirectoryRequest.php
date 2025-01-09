<?php

namespace App\Http\Requests;

use App\Rules\ValidDirectory;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AbstractTrackedDirectoryRequest extends FormRequest
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
                new ValidDirectory(),
            ],
        ];
    }
}
