@extends('base')

@section('title')
    @lang('messages.main.title')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.file.titles.add')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4"></div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Remove <i class="fa-solid fa-circle-right"></i></th>
                        <th scope="col">Add<i class="fa-solid fa-circle-left"></i> Remove</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($files as $trackedFile)
                        <tr>
                            <th scope="row">{{ $trackedFile->id }}</th>
                            <td>
                                @if($trackedFile->trackedDirectory)
                                    @lastFolders($trackedFile->trackedDirectory->normalized_path)
                                @else
                                    <em>No Directory</em>
                                @endif
                            </td>
                            <td>
                                @iconForFile($trackedFile->normalized_path){{ $trackedFile->normalized_path }}</td>
                            <td>
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    @include('tracked_file/buttons/view')
                                    @include('tracked_file/buttons/delete')
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
