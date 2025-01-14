<?php

namespace App\Models;

use App\Helpers\SlugHelper;
use Illuminate\Database\Eloquent\Model;

class TrackedTag extends Model
{
    protected $fillable = [
        'tag',
        'slug'
    ];

    public function setTag(string $value): void
    {
        $this->attributes['tag'] = trim($value);
        $this->attributes['slug'] = SlugHelper::slugify(trim($value));
    }
}
