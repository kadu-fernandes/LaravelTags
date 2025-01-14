@extends('base')

@section('title')
    @lang('messages.tracked.directory.add.title')
@endsection

@section('content')
    <div class="container py-4">
        <h1>@lang('messages.tracked.directory.add.title')</h1>
        <form action="{{ route('tracked_directory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="normalized_path" class="form-label">@lang('messages.shared.normalized_path')</label>
                <input type="text" id="normalized_path" name="normalized_path" class="form-control"
                       placeholder="Enter directory path" required>
            </div>
            <div class="mt-3">
                @include('tracked_directory/buttons/save')
                @include('tracked_directory/buttons/cancel')
            </div>
        </form>
    </div>
@endsection
