@extends('base')

@section('title')
    {{ $trackedTag->tag }}
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.tag.titles.show')</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-9">
                <label for="tag" class="form-label">@lang('messages.shared.tag')</label>
                <input type="text" class="form-control" id="tag"
                       value="{{ $trackedTag->tag }}" disabled>
            </div>
            <div class="col-3">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-9">
                <label for="tag" class="form-label">@lang('messages.shared.slug')</label>
                <input type="text" class="form-control" id="tag"
                       value="{{ $trackedTag->slug }}" disabled>
            </div>
            <div class="col-3">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="tag" class="form-label">@lang('messages.shared.description')</label>
                <textarea class="form-control" id="tag" rows="3" disabled>{{ $trackedTag->description }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center gap-2 pt-3">
                @include('tracked_tag/buttons/edit')
                @include('tracked_tag/buttons/delete')
                @include('tracked_tag/buttons/back')
            </div>
        </div>
    </div>
@endsection
