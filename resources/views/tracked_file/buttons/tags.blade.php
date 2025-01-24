@if(isset($trackedFile))
    <a href="{{ route('file_tag.index', ['trackedFile' => $trackedFile->id]) }}"
       id="createButton"
       class="btn btn-sm btn-success"
       title="@lang('messages.tracked.file.buttons.tags')">
        <i class="fa-solid fa-tags"></i> @lang('messages.tracked.file.buttons.tags')
    </a>
@endif
