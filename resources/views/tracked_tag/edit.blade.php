@extends('base')

@section('title')
    @lang('messages.tracked.tag.titles.edit')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.tag.titles.edit')</h1>
            </div>
        </div>

        <!-- Edit Form -->
        <form action="{{ route('tracked_tag.update', $trackedTag) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Tag Field -->
            <div class="row">
                <div class="col-9">
                    <label for="tag" class="form-label">@lang('messages.shared.tag')</label>
                    <input type="text" class="form-control" id="tag" name="tag"
                           value="{{ old('tag', $trackedTag->tag) }}" required>
                </div>
                <div class="col-3">&nbsp;</div>
            </div>

            <!-- Slug Field -->
            <div class="row">
                <div class="col-9">
                    <label for="slug" class="form-label">@lang('messages.shared.slug')</label>
                    <input type="text" class="form-control" id="slug" name="slug"
                           value="{{ old('slug', $trackedTag->slug) }}" readonly>
                </div>
                <div class="col-3">&nbsp;</div>
            </div>

            <!-- Description Field -->
            <div class="row">
                <div class="col-12">
                    <label for="description" class="form-label">@lang('messages.shared.description')</label>
                    <textarea class="form-control" id="description" name="description"
                              rows="3">{{ old('description', $trackedTag->description) }}</textarea>
                </div>
            </div>

            <!-- Buttons -->
            <div class="row">
                <div class="col-12 d-flex justify-content-end align-items-center gap-2 pt-3">
                    @include('tracked_tag/buttons/save')
                    @include('tracked_tag/buttons/cancel')
                </div>
            </div>
        </form>
    </div>
@endsection
