@extends('base')

@section('title')
    @lang('messages.tracked.directory.titles.add')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.titles.add')</h1>
            </div>
        </div>

        <form action="{{ route('tracked_file.store') }}" method="POST">
            @csrf

            <!-- Hidden Field for Directory ID -->
            <input type="hidden" name="tracked_directory_id" value="{{ request()->route('trackedDirectory')->id }}">

            <div class="row mb-3">
                <div class="col-9">
                    <label for="normalized_path" class="form-label">@lang('messages.shared.normalized_path')</label>
                    <input type="text" id="normalized_path" name="normalized_path"
                           class="form-control @error('normalized_path') is-invalid @enderror"
                           placeholder="@lang('messages.shared.placeholder.directory_path')" required
                           value="{{ old('normalized_path') }}">
                    <x-validation-error field="normalized_path"/>
                    <x-validation-error field="tracked_directory_id"/>
                </div>
                <div class="col-3">&nbsp;</div>
            </div>

            <div class="row">
                <div class="col-12 d-flex justify-content-end align-items-center gap-2 pt-3">
                    @include('tracked_file/buttons/cancel')
                    @include('tracked_file/buttons/save')
                </div>
            </div>
        </form>


    </div>
@endsection
