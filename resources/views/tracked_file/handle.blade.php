@extends('base')

@section('title')
    @lang('messages.tracked.file.titles.handle')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.file.titles.handle')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <span class="ibm-plex-mono-regular">
                    @iconForFile($trackedFile->normalized_path) {{ $trackedFile->normalized_path }}
                </span>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    @include('tracked_file/buttons/back')
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-5"><label>Remove <i class="fa-regular fa-circle-right"></i></label></div>
            <div class="col-2">&nbsp;</div>
            <div class="col-5"><label><i class="fa-regular fa-circle-left"></i> Add</label></div>
        </div>
        <div class="row">
            <div class="col-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            <div class="col-5">@include('tracked_file/tags/remove_tags')</div>
            <div class="col-2">&nbsp;</div>
            <div class="col-5">@include('tracked_file/tags/add_tags')</div>
        </div>
    </div>
@endsection
