<form action="{{ route('tracked_directory.destroy', $trackedDirectory) }}"
      method="POST"
      class="d-inline-block mb-0">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="btn btn-sm btn-danger"
            title="@lang('messages.shared.delete')">
        <i class="fa-regular fa-trash-can"></i>
    </button>
</form>
