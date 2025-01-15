@extends('base')

@section('title')
    @lang('messages.tracked.tag.titles.add')
@endsection

@section('content')
    <div class="container py-4">
        <!-- Header -->
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.tag.titles.add')</h1>
            </div>
        </div>

        <!-- Add Form -->
        <form action="{{ route('tracked_tag.store') }}" method="POST">
            @csrf

            <!-- Tag Field -->
            <div class="row mb-3">
                <div class="col-9">
                    <label for="tag" class="form-label">@lang('messages.shared.tag')</label>
                    <input type="text" id="tag" name="tag" class="form-control"
                           placeholder="@lang('messages.shared.placeholder.tag')" required>
                </div>
                <div class="col-3">&nbsp;</div>
            </div>

            <!-- Description Field -->
            <div class="row mb-3">
                <div class="col-12">
                    <label for="description" class="form-label">@lang('messages.shared.description')</label>
                    <textarea class="form-control" id="description" name="description"
                              placeholder="@lang('messages.shared.placeholder.description')" rows="3"></textarea>
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
