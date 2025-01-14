@extends('base')

@section('title')
    Tracked Directories
@endsection

@section('content')
    <div class="container py-4">
        <h1>Tracked Directories</h1>
        <a href="{{ route('tracked_directory.create') }}" class="btn btn-sm btn-primary mb-3">Add Directory</a>
        @include('validation_errors')
        <ul class="list-group">
            @foreach ($trackedDirectories as $trackedDirectory)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{ $trackedDirectory->normalized_path }}</span>
                    <div>
                        <a href="{{ route('tracked_directory.show', $trackedDirectory) }}" class="btn btn-sm btn-info">View</a>
                        <form action="{{ route('tracked_directory.destroy', $trackedDirectory) }}" method="POST"
                              style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
