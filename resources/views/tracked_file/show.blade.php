@extends('base')

@section('title')
    {{ $trackedFile->normalized_path }}
@endsection

@section('content')
    <div class="container py-4">
        <!-- Header Section -->
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.titles.show')</h1>
            </div>
        </div>

        <!-- Normalized Path -->
        <div class="row">
            <div class="col-9">
                <label for="normalized_path" class="form-label">@lang('messages.shared.normalized_path')</label>
                <input type="text" class="form-control ibm-plex-mono-regular" id="normalized_path"
                       value="{{ $trackedFile->normalized_path }}" disabled>
            </div>
            <div class="col-3">
                &nbsp;
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="row">
            <div class="col-12 d-flex justify-content-end align-items-center gap-2 pt-3">
                @include('tracked_file/buttons/delete')
                @include('tracked_file/buttons/back')
            </div>
        </div>
    </div>
@endsection
