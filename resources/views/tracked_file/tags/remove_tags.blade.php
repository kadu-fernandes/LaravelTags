@if(isset($foundTags))
    @foreach ($foundTags as $foundTag)
        <a href="{{ route('tracked_file.remove_tag', ['trackedFile' => $trackedFile->id, 'trackedTag' => $foundTag->id]) }}"
           class="btn btn-sm btn-info align-self-end mb-3"
           title="{{ $foundTag->description }}">
            {{$foundTag->tag}}
        </a>
    @endforeach
@endif
