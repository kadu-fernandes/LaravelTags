@extends('base')

@section('title')
    @lang('messages.tracked.directory.add.title')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.index.title')</h1>
                <div>
                    @include('tracked_directory/buttons/add')
                </div>
            </div>
        </div>
        @include('validation_errors')
        <ul class="list-group">
            @foreach ($trackedDirectories as $trackedDirectory)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $trackedDirectory->normalized_path }}</span>
                    <div>
                        @include('tracked_directory/buttons/view')
                        @include('tracked_directory/buttons/delete')
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
