@extends('base')

@section('content')
    <h1>Add Tracked Directory</h1>
    <form action="{{ route('tracked_directory.store') }}" method="POST">
        @csrf
        <label for="normalized_path">Directory Path:</label>
        <input type="text" id="normalized_path" name="normalized_path" placeholder="Enter directory path" required>
        <button type="submit" class="btn btn-sm btn-success">Add</button>
        @if(isset($variable))
            <a href="{{ route('tracked_directory.view', ['id' => $trackedDirectory->id]) }}"
               class="btn btn-sm btn-primary">Cancel</a>
        @else
            <a href="{{ route('tracked_directory.index') }}" class="btn btn-sm btn-primary">Cancel</a>
        @endif
    </form>
@endsection
