<?php

namespace App\Http\Controllers;

use App\Models\TrackedFile;
use App\Repositories\TrackedTagRepository;
use Illuminate\Contracts\View\View;

class FileTagsController extends Controller
{
    public function __construct(private readonly TrackedTagRepository $trackedTagRepository)
    {
    }

    public function index(TrackedFile $trackedFile): View
    {
        $foundTags = $this->trackedTagRepository->findTags($trackedFile);
        $tags = $this->trackedTagRepository->findTagsNotAssignedToFile($trackedFile);

        return view('file_tags.index', compact('trackedFile', 'foundTags', 'tags'));
    }
}
