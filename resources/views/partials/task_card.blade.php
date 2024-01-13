<div class="task-progress-card">
  <div class="task-progress-card-left">
    @if ($task->status == 'completed')
      <div class="material-icons task-progress-card-top-checked">check_circle</div>
    @else
      <div class="material-icons task-progress-card-top-check">check_circle</div>
    @endif
    <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="material-icons task-progress-card-top-edit">more_vert</a>
  </div>
  <p class="task-progress-card-title">{{ $task->name }}</p>
  <div>
    <p>{{ $task->detail }}</p>
  </div>
  <div>
    <p>Due on {{ $task->due_date }}</p>
  </div>
  <div class="@if ($leftStatus) task-progress-card-left @else task-progress-card-right @endif">
    @if ($leftStatus)
      <button class="material-icons">chevron_left</button>
    @endif

    @if ($rightStatus)
      <button class="material-icons">chevron_right</button>
    @endif
  </div>
</div>