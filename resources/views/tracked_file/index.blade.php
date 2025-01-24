@extends('base')

@section('title')
    @lang('messages.tracked.file.titles.index')
@endsection

@section('script_bottom')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let directoryDropdown = document.getElementById('directory');
            let createButton = document.getElementById('createButton');

            let baseCreatePath = "{{ url('/tracked/file/directory/__ID__/create') }}";

            function updateButtonState() {
                let selectedDirectory = directoryDropdown.value;

                if (!selectedDirectory) {
                    createButton.classList.add('disabled');
                    createButton.href = "#"; // Disable the link when no directory is selected
                } else {
                    createButton.classList.remove('disabled');
                    createButton.href = baseCreatePath.replace('__ID__', selectedDirectory);
                }
            }

            if (directoryDropdown) {
                directoryDropdown.addEventListener('change', updateButtonState);
                updateButtonState();
            }

            if (createButton) {
                createButton.addEventListener('click', function (event) {
                    if (this.classList.contains('disabled')) {
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
@endsection

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h1>@lang('messages.tracked.file.titles.index')</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end align-items-center gap-2">
                    <div></div>
                    \
                    <form id="directoryForm">
                        <label for="directory">Filter by Directory:</label>
                        <select id="directory" class="form-control">
                            <option
                                value="" {{ request()->routeIs('tracked_file.index') && !request('trackedDirectory') ? 'selected' : '' }}>
                                -- Not Selected --
                            </option>
                            @foreach($directories as $directory)
                                <option value="{{ $directory->id }}"
                                    {{ optional($trackedDirectory)->id == $directory->id ? 'selected' : '' }}>
                                    {{ $directory->normalized_path }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Directory</th>
                        <th scope="col">File</th>
                        <th scope="col">
                            <div class="d-flex justify-content-end align-items-center gap-2">
                            </div>
                            @include('tracked_file/buttons/add')
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
                                <span class="ibm-plex-mono-regular">
                                    @iconForFile($trackedFile->normalized_path) {{ $trackedFile->normalized_path }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-end align-items-center gap-2">
                                    @include('tracked_file/buttons/view')
                                    @include('tracked_file/buttons/tags')
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
