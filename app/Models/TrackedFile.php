<?php

namespace App\Models;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TrackedFile extends AbstractNormalizedPathModel
{
    protected $fillable = [
        'normalized_path',
        'tracked_directory_id',
    ];

    /**
     * @throws InvalidPathException
     */
    public function setNormalizedPathAttribute(string $value): void
    {
        parent::setNormalizedPathAttribute($value);
        NormalizedPathHelper::assertIsFile($this->normalized_path);
    }

    public function trackedDirectory(): BelongsTo
    {
        return $this->belongsTo(TrackedDirectory::class);
    }

    public function trackedTags(): BelongsToMany
    {
        return $this->belongsToMany(TrackedTag::class, 'tracked_file_tracked_tag');
    }

}
