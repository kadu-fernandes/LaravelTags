@extends('base')

@section('title')
    @lang('messages.tracked.directory.titles.index')
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.directory.titles.index')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Directory</th>
                        <th scope="col">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                                @include('tracked_directory/buttons/add')
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if ($errors->any())
                        <tr>
                            <td colspan="3">
                                @include('validation_errors')
                            </td>
                        </tr>
                    @endif
                    @foreach ($trackedDirectories as $trackedDirectory)
                        <tr>
                            <th scope="row">{{ $trackedDirectory->id }}</th>
                            <td class="ibm-plex-mono-regular">{{ $trackedDirectory->normalized_path }}</td>
                            <td>
                                <div class="d-flex justify-content-end align-items-center align-items-end gap-2">
                                    @include('tracked_directory/buttons/view')
                                    @include('tracked_directory/buttons/delete')
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
