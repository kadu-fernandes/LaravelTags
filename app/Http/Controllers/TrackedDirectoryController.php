<?php

namespace App\Http\Controllers;

use App\Models\TrackedDirectory;
use App\Rules\UniqueNormalizedPath;
use App\Rules\ValidDirectory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TrackedDirectoryController extends Controller
{
    public function index(): View
    {
        $trackedDirectories = TrackedDirectory::all();

        return view('tracked_directory.index', compact('trackedDirectories'));
    }

    public function create(): View
    {
        return view('tracked_directory.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'normalized_path' => [
                'required',
                'string',
                'max:512',
                new ValidDirectory(),
                new UniqueNormalizedPath(),
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('tracked_directory.index')
                ->withErrors($validator)
                ->withInput();
        }

        TrackedDirectory::create($validator->validated());

        return redirect()->route('tracked_directory.index');
    }

    public function show(TrackedDirectory $trackedDirectory): View
    {
        return view('tracked_directory.show', compact('trackedDirectory'));
    }

    public function destroy(TrackedDirectory $trackedDirectory): RedirectResponse
    {
        $trackedDirectory->delete();

        return redirect()->route('tracked_directory.index');
    }
}
