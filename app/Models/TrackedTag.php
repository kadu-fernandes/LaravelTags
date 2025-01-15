<?php

namespace App\Models;

use App\Helpers\SlugHelper;
use Illuminate\Database\Eloquent\Model;

class TrackedTag extends Model
{
    protected $fillable = [
        'tag',
        'slug',
        'description'
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (TrackedTag $trackedTag): void {
            if (empty($trackedTag->slug)) {
                $trackedTag->slug = SlugHelper::slugify($trackedTag->tag);
            }
        });
    }

    public function setTag(string $value): void
    {
        $this->attributes['tag'] = trim($value);
        $this->attributes['slug'] = SlugHelper::slugify(trim($value));
    }
}
