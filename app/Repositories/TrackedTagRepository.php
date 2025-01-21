<?php

namespace App\Repositories;

use App\Models\TrackedFile;
use App\Models\TrackedTag;
use Illuminate\Database\Eloquent\Collection;

class TrackedTagRepository
{
    /**
     * @return Collection<TrackedTag>
     */
    public function findTags(?TrackedFile $trackedFile = null): Collection
    {
        if (null === $trackedFile) {
            return TrackedTag::orderBy('tag')->get();
        }

        return TrackedTag::whereHas('trackedFiles', function ($query) use ($trackedFile): void {
            $query->where('tracked_files.id', $trackedFile->id);
        })->orderBy('tag')->get();
    }

    /**
     * @return Collection<TrackedTag>
     */
    public function findTagsNotAssignedToFile(TrackedFile $trackedFile): Collection
    {
        return TrackedTag::whereNotIn('id', function ($subQuery) use ($trackedFile): void {
            $subQuery->select('tracked_tag_id')
                ->from('tracked_file_tracked_tag')
                ->where('tracked_file_id', $trackedFile->id);
        })->orderBy('tag')->get();
    }
}
