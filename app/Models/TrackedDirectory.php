<?php

namespace App\Models;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TrackedDirectory extends AbstractNormalizedPathModel
{
    /**
     * @throws InvalidPathException
     */
    public function setNormalizedPathAttribute(string $value): void
    {
        parent::setNormalizedPathAttribute($value);
        NormalizedPathHelper::assertIsDirectory($this->normalized_path);
    }

    public function trackedFiles(): HasMany
    {
        return $this->hasMany(TrackedFile::class);
    }
}
