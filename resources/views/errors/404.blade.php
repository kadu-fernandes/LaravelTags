@extends('base')

@section('title')
    @lang('messages.shared.errors.404.title')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <h1>@lang('messages.shared.errors.404.title')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <img src="{{ asset('images/404.gif') }}" alt="A">
            </div>
        </div>
    </div>
@endsection
