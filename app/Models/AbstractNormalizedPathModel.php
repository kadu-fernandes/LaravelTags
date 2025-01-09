<?php

namespace App\Models;

use App\Exceptions\InvalidPathException;
use App\Helpers\NormalizedPathHelper;
use DateTime;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 * @property string normalized_path
 * @property DateTime created_at
 * @property DateTime updated_at
 */
abstract class AbstractNormalizedPathModel extends Model
{
    protected $fillable = [
        'normalized_path'
    ];

    /**
     * @throws InvalidPathException
     */
    public function setNormalizedPathAttribute(string $value): void
    {
        $this->attributes['normalized_path'] = NormalizedPathHelper::expandPath($value);
    }
}
