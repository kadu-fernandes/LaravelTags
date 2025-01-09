<?php

namespace App\Models;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;

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
}
