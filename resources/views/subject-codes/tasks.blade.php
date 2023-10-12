<nav>
  <ul class="nav nav-tabs">
    @foreach([
        'Informatics Skill', 
        'Informatics Knowledge', 
        'Computer Skills'
      ] as $value)
      <li class="nav-item">
        <a class="nav-link {{ $category === $value ? 'active' : '' }}" href="{{ route('subject-codes.show', ['id' => $data->id, 'tab' => 'tasks', 'category' => $value])  }}">{{ $value }}</a>
      </li>
    @endforeach
  </ul>
</nav>
<div class="tab-content">
  <div class="tab-pane fade w-100 pt-4 pb-4 show active" id="nav-{{ \Illuminate\Support\Str::slug($category) }}">
    @include('shared.pagination')
      @foreach ($list as $task)
        <div class="card shadow-sm mb-2 w-100">
          <div class="card-body">
            <div class="d-flex">
              <div class="flex-grow-1">
                <div class="d-flex justify-content-start align-items-start">
                  <div>
                    <h5 class="mb-2 text-dark text-decoration-none">{{ $task->title }}</h5>
                    <p class="mb-0 text-dark text-decoration-none">{{ $task->category }}</p>
                    <p class="mb-0 text-dark text-decoration-none">Deadline on {{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y g:i A') }}</p>
                  </div>
                </div>
              </div>
              <div>
                <p class="mb-3 small text-end text-success">{{ $task->taskSubmissions()->count() }}/{{ $data->students()->count() }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a class="btn btn-sm btn-primary" href="{{ route('tasks.show', $task->id) }}">
                    <i class="fas fa-eye"></i>
                  </a>
                  @if(auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                    @include('shared.delete-item', ['class' => 'me-2', 'type' => 'SubjectCode', 'id' => $task->id, 'url' => route('tasks.delete')])
                    <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $task->id) }}">
                      <i class="fa-solid fa-pencil"></i>
                    </a>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    @include('shared.pagination')
  </div>
</div>