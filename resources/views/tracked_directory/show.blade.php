@extends('base')

@section('title')
    {{ $trackedDirectory->normalized_path }}
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.show.title')</h1>
                <div class="d-flex align-items-center gap-2">
                    @include('tracked_directory/buttons/delete')
                    @include('tracked_directory/buttons/back')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 ">
                <span class="ibm-plex-mono-regular ">{{ $trackedDirectory->normalized_path }}</span>
            </div>
        </div>
    </div>
@endsection
