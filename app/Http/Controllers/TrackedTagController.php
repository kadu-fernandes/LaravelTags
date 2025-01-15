<?php

namespace App\Http\Controllers;

use App\Models\TrackedTag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class TrackedTagController extends Controller
{
    public function index(): View
    {
        $trackedTags = TrackedTag::all();

        return view('tracked_tag.index', compact('trackedTags'));
    }

    public function create(): View
    {
        return view('tracked_tag.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = Validator::make($request->all(), [
            'tag' => [
                'required',
                'string',
                'max:512',
                'unique:tracked_tags,tag'
            ],
            'description' => ['nullable', 'string', 'max:1024'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('tracked_tag.index')
                ->withErrors($validator)
                ->withInput();
        }

        TrackedTag::create($validator->validated());

        return redirect()->route('tracked_tag.index');
    }

    public function show(TrackedTag $trackedTag): View
    {
        return view('tracked_tag.show', compact('trackedTag'));
    }

    public function edit(TrackedTag $trackedTag): View
    {
        return view('tracked_tag.edit', compact('trackedTag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrackedTag $trackedTag): RedirectResponse
    {
        // Validate the input data, excluding 'slug'
        $validator = Validator::make($request->all(), [
            'tag' => [
                'required',
                'string',
                'max:512',
                Rule::unique('tracked_tags', 'tag')->ignore($trackedTag->id),
            ],
            'description' => ['nullable', 'string', 'max:1024'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('tracked_tag.edit', $trackedTag)
                ->withErrors($validator)
                ->withInput();
        }

        $trackedTag->update($validator->validated());

        return redirect()
            ->route('tracked_tag.index')
            ->with('success', __('messages.tracked.tag.updated'));
    }

    public function destroy(TrackedTag $trackedTag): RedirectResponse
    {
        $trackedTag->delete();

        return redirect()->route('tracked_tag.index');
    }
}
