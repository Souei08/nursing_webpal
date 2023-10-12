<nav>
  <ul class="nav nav-tabs">
    @foreach([
        'Informatics Skill', 
        'Informatics Knowledge', 
        'Computer Skills'
      ] as $value)
      <li class="nav-item">
        <a class="nav-link {{ $category === $value ? 'active' : '' }}" href="{{ route('tasks.list', ['category' => $value])  }}">{{ $value }}</a>
      </li>
    @endforeach
  </ul>
</nav>
<div class="tab-content">
  <div class="tab-pane fade w-100 pt-4 pb-4 show active" id="nav-{{ \Illuminate\Support\Str::slug($category) }}">
    @include('shared.pagination')
      @foreach ($list as $data)
        <div class="card shadow-sm mb-2 w-100">
          <div class="card-body">
            <div class="d-flex">
              <div class="flex-grow-1 ms-3">
                <div class="d-flex justify-content-start align-items-center">
                  @if(auth()->user()->role->slug === 'student')
                    @php
                      $submission = $data->taskSubmissions()->where(['user_id' => auth()->user()->id])->first();
                    @endphp
                    @if($submission)
                      <div style="width: 10px; height: 10px;" class="bg-success me-3 rounded-circle"></div>
                    @else
                      <div style="width: 10px; height: 10px;" class="bg-danger me-3 rounded-circle"></div>
                    @endif
                  @endif
                  <div>
                    <h5 class="mb-2 text-dark text-decoration-none">{{ $data->title }}</h5>
                    <p class="mb-0 text-dark text-decoration-none">{{ $data->category }}</p>
                    <p class="mb-0 text-dark text-decoration-none">Deadline on {{ \Carbon\Carbon::parse($data->deadline)->format('M d, Y g:i A') }}</p>
                    @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
                      <p class="mb-0 text-dark text-decoration-none">Subject code: {{ $data->subjectCode->name }}</p>
                    @endif
                  </div>
                </div>
              </div>
              <div>
                @if($data->is_active)
                  @if(auth()->user()->role->slug === 'student')
                    @if($submission)
                      @if($submission->status === 'Pending')
                        <p class="mb-3 small text-end text-warning">Score and Comment are not available</p>
                      @else
                        <p class="mb-3 small text-end text-success">Score and Comment are available</p>
                      @endif
                    @endif
                  @endif
                @else
                  <p class="mb-3 small text-end text-danger">Task Expired</p>
                @endif
                <div class="d-flex justify-content-end align-items-center">
                  <a class="btn btn-sm btn-primary" href="{{ route('tasks.show', $data->id) }}">
                    <i class="fas fa-eye"></i>
                  </a>
                  @if(auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                    @include('shared.delete-item', ['class' => 'me-2', 'type' => 'SubjectCode', 'id' => $data->id, 'url' => route('tasks.delete')])
                    <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $data->id) }}">
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