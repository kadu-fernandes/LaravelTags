@if(isset($trackedDirectoryFile))
    <a href="{{ route('tracked_file.show', ['id' => $trackedDirectoryFile->id]) }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@else
    <a href="{{ route('tracked_file.index') }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@endif
