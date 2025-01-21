<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrackedFileRequest;
use App\Http\Requests\UpdateTrackedFileRequest;
use App\Models\TrackedDirectory;
use App\Models\TrackedFile;
use App\Models\TrackedTag;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TrackedFileController extends Controller
{
    public function index(?TrackedDirectory $trackedDirectory = null): View
    {
        $directories = TrackedDirectory::all();

        $files = $trackedDirectory
            ? $trackedDirectory->trackedFiles()->orderBy('normalized_path')->get()
            : TrackedFile::orderBy('normalized_path')->get(); // ✅ Added orderBy

        return view('tracked_file.index', compact('files', 'trackedDirectory', 'directories'));
    }

    public function create(TrackedDirectory $trackedDirectory): View
    {
        return view('tracked_file.create', compact('trackedDirectory'));
    }

    public function store(StoreTrackedFileRequest $request): RedirectResponse
    {
        $file = TrackedFile::create($request->validated());

        return redirect()->route('tracked_file.index');
    }

    public function show(TrackedFile $trackedFile): View
    {
        return view('tracked_file.show', compact('trackedFile'));
    }

    public function edit(TrackedFile $trackedFile): View
    {
        $tags = TrackedTag::all();

        return view('tracked_file.edit', compact('trackedFile', 'tags'));
    }

    public function update(UpdateTrackedFileRequest $request, TrackedFile $trackedFile): RedirectResponse
    {
        $trackedFile->update($request->validated());

        return redirect()->route('tracked_file.show', $trackedFile);
    }

    public function destroy(TrackedFile $trackedFile): RedirectResponse
    {
        $trackedFile->delete();

        return redirect()->route('tracked_file.index');
    }

    public function addTag(TrackedFile $trackedFile, TrackedTag $trackedTag): RedirectResponse
    {
        $trackedFile->trackedTags()->syncWithoutDetaching([$trackedTag->id]);

        return back();
    }

    public function removeTag(TrackedFile $trackedFile, TrackedTag $trackedTag): RedirectResponse
    {
        $trackedFile->trackedTags()->detach($trackedTag->id);

        return back();
    }
}
