<form action="{{ route('tracked_tag.destroy', $trackedTag) }}"
      method="POST"
      class="d-inline-block mb-0">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="btn btn-sm btn-danger"
            title="@lang('messages.shared.delete')">
        <i class="fa-regular fa-trash-can"></i> @lang('messages.shared.delete')
    </button>
</form>
