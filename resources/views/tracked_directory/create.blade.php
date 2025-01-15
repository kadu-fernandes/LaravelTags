@extends('base')

@section('title')
    @lang('messages.tracked.directory.titles.add')
@endsection

@section('content')
    <div class="container py-4">
        <!-- Header -->
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.titles.add')</h1>
            </div>
        </div>

        <!-- Add Form -->
        <form action="{{ route('tracked_directory.store') }}" method="POST">
            @csrf

            <!-- Normalized Path Field -->
            <div class="row mb-3">
                <div class="col-9">
                    <label for="normalized_path" class="form-label">@lang('messages.shared.normalized_path')</label>
                    <input type="text" id="normalized_path" name="normalized_path" class="form-control"
                           placeholder="@lang('messages.shared.placeholder.directory_path')" required>
                </div>
                <div class="col-3">&nbsp;</div>
            </div>

            <!-- Buttons -->
            <div class="row">
                <div class="col-12 d-flex justify-content-end align-items-center gap-2 pt-3">
                    @include('tracked_directory/buttons/save')
                    @include('tracked_directory/buttons/cancel')
                </div>
            </div>
        </form>
    </div>
@endsection
