@extends('base')

@section('title')
    {{ $trackedDirectory->normalized_path }}
@endsection

@section('content')
    <div class="container py-4">
        <h1>Tracked Directory</h1>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="ibm-plex-mono-regular ">{{ $trackedDirectory->normalized_path }}</span>
                <div>
                    <form action="{{ route('tracked_directory.destroy', [$trackedDirectory]) }}" method="POST"
                          style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('tracked_directory.index') }}" class="btn btn-sm btn-primary">Back to List</a>
                </div>
            </li>
        </ul>
    </div>
@endsection
