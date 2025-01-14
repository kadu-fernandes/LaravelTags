<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;

class AbstractTrackedTagRequest
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
            'tag' => [
                'required',
                'string',
                'max:512',
                'unique'
            ],
        ];
    }
}
