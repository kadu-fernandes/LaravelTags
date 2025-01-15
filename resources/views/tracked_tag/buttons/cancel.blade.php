@if(isset($trackedTag))
    <a href="{{ route('tracked_tag.show', ['trackedTag' => $trackedTag->id]) }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@else
    <a href="{{ route('tracked_tag.index') }}"
       class="btn btn-sm btn-warning"
       title="@lang('messages.shared.cancel')">
        <i class="fa-solid fa-ban"></i> @lang('messages.shared.cancel')
    </a>
@endif
