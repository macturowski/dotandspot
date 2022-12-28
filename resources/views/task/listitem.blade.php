<div class="p-2 rounded-lg shadow-lg bg-{{ $color }} mb-4">
    <strong>{{ $task->name }}</strong><br />
    <a href="{{ route('task.edit', $task) }}">
        <button class="bg-transparent font-semibold py-1 px-2 border border-{{ $color }} mb-1 text-sm rounded">
            {{ __('Edit') }}
        </button>
    </a>
    <form action="{{ route('task.destroy', $task) }}" method="POST"  class="block sm:inline">
        @csrf
        @method('delete')
        <button type="submit"  class="bg-transparent font-semibold py-1 px-2 border border-{{ $color }} mb-1 text-sm rounded" onClick="return confirm('{{ __('Are you sure to delete task?') }}')">{{ __('Delete') }}</button>
    </form>  
    <form action="{{ route('task.status', $task) }}" method="POST"  class="block sm:inline">
        @csrf
        @method('put')
        <input type="hidden" name="is_done" value="{{ $status }}" />
        <button type="submit" class="bg-transparent font-semibold  py-1 px-2 border border-{{ $color }} mb-1 text-sm rounded">{{ __('Change to') }} {{ $changebutton }}</button>
    </form>  
    
</div>