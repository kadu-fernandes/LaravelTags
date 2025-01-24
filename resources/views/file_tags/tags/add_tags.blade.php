@if(isset($tags))
    @foreach ($tags as $tag)
        <a href="{{ route('tracked_file.add_tag', ['trackedFile' => $trackedFile->id, 'trackedTag' => $tag->id]) }}"
           class="btn btn-sm btn-success align-self-end mb-3"
           title="@lang('messages.tracked.file.buttons.tags')">
            {{$tag->tag}}
        </a>
    @endforeach
@endif
