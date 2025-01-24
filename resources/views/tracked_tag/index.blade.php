@extends('base')

@section('title')
    @lang('messages.tracked.tag.titles.add')
@endsection

@php
    use League\CommonMark\CommonMarkConverter;
    $converter = new CommonMarkConverter();
@endphp

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.tag.titles.index')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tag</th>
                        <th scope="col">Description</th>
                        <th scope="col">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                @include('tracked_tag/buttons/add')
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($errors->any())
                        <tr>
                            <td colspan="4">
                                @include('validation_errors')
                            </td>
                        </tr>
                    @endif
                    @foreach ($trackedTags as $trackedTag)
                        <tr>
                            <th scope="row">{{ $trackedTag->id }}</th>
                            <td>{{ $trackedTag->tag }}</td>
                            <td class="markdown-content">{!! $converter->convert($trackedTag->description ?? '') !!}</td>
                            <td>
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    @include('tracked_tag/buttons/view')
                                    @include('tracked_tag/buttons/edit')
                                    @include('tracked_tag/buttons/delete')
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
