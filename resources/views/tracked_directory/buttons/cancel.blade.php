@if(isset($trackedDirectory))
    <a href="{{ route('tracked_directory.view', ['id' => $trackedDirectory->id]) }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@else
    <a href="{{ route('tracked_directory.index') }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@endif
