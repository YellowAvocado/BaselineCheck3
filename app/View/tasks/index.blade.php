@foreach($tasks as $task)
    <li>
        {{ $task->title }}
        @if (!$task->completed)
            <form action="{{ route('tasks.mark_completed', $task) }}" method="post">
                @csrf
                <button type="submit">Mark as Completed</button>
            </form>
        @else
            (Completed)
        @endif
    </li>
@endforeach
