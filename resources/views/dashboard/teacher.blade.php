<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-sm-8">
      <h3 class="mb-0">Dashboard</h3>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-4 mb-0">Hi, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
  </div>
  <div class="">
    <div class="row">
      <div class="col"></div>
      <div></div>
    </div>
    <h4 class="mb-3">Subject Codes</h4>

    @include('subject-codes.subject-code-filter')

    @if(count($subject_codes) === 0)
      <p>No Subject Code Yet</p>
    @else
    <div class="row mb-3 overflow-auto subject-code-sidebar-db" id="subjectCodesData" style="height: 350px;">
      @foreach($subject_codes as $subjectCode)
        <div class="col-md-4 mb-3" style="height: 150px;">
          <a href="{{ route('subject-codes.show', ['id' => $subjectCode->id, 'tab' => 'students']) }}" class="text-decoration-none text-black">
            <div class="card h-100">
              <div class="card-body">
                <h5 class="card-title mt-3">{{ $subjectCode->name }}</h5>
                <p class="text-muted">{{ $subjectCode->description }}</p>
                <p class="mb-0"><i class='bx bx-user'></i> {{ $subjectCode->students()->count() }} &nbsp;&nbsp;&nbsp;  <i class='bx bx-task'></i> {{ $subjectCode->tasks()->count() }}</p>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
    @endif
  </div>
  <div class="">
    <h4 class="mb-3">Tasks</h4>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        @foreach($tasks as $key => $value)
          <button class="nav-link {{ $key === 'Informatics Skill' ? 'active' : '' }}" id="nav-{{ \Illuminate\Support\Str::slug($key) }}-tab" data-bs-toggle="tab" data-bs-target="#nav-{{ \Illuminate\Support\Str::slug($key) }}" type="button" role="tab" aria-controls="nav-{{ \Illuminate\Support\Str::slug($key) }}" aria-selected="true">
            <!-- <img src="{{ asset('images/icons/'.$value[0]) }}" class="me-2" style="width: 18px;"> -->
            {{ $key }}
          </button>
        @endforeach
      </div>
    </nav>
    <div class="tab-content w-100" id="nav-tabContent">
      @foreach($tasks as $key => $value)
        <div class="tab-pane fade w-100 pt-3 pb-3 {{ $key === 'Informatics Skill' ? 'show active' : '' }}" id="nav-{{ \Illuminate\Support\Str::slug($key) }}" role="tabpanel" aria-labelledby="nav-{{ \Illuminate\Support\Str::slug($key) }}-tab" tabindex="0">
          @if(count($value[1]) === 0)
            <div class="text-center p-5">
              <p>No Task Yet</p>
            </div>
          @else
            @foreach ($value[1] as $task)              
              <div class="card shadow-sm mb-2 w-100">
                <div class="card-body">
                  <div class="d-flex">
                    <div class="flex-grow-1 ms-3">
                      <div class="d-flex justify-content-start align-items-center">
                        @php
                          $submission = $task->taskSubmissions()->where(['user_id' => auth()->user()->id])->first();
                        @endphp
                        @if($submission)
                          <div style="width: 10px; height: 10px;" class="bg-success me-3 rounded-circle"></div>
                        @else
                          <div style="width: 10px; height: 10px;" class="bg-danger me-3 rounded-circle"></div>
                        @endif
                        <div>
                          <h5 class="mb-2 text-dark text-decoration-none">{{ $task->title }}</h5>
                          <p class="mb-0 text-dark text-decoration-none">{{ $task->category }}</p>
                          <p class="mb-0 text-dark text-decoration-none">Deadline on {{ \Carbon\Carbon::parse($task->deadline)->format('M d, Y g:i A') }}</p>
                          <p class="mb-0 text-dark text-decoration-none">Subject code: {{ $task->subjectCode->name }}</p>
                        </div>
                      </div>
                    </div>
                    <div>
                      @if($task->is_active)
                        @if($submission)
                          @if($submission->status === 'Pending')
                            <p class="mb-3 small text-end text-warning">Score and Comment are not available</p>
                          @else
                            <p class="mb-3 small text-end text-success">Score and Comment are available</p>
                          @endif
                        @endif
                      @else
                        <p class="mb-3 small text-end text-danger">Task Expired</p>
                      @endif
                      <div class="d-flex justify-content-end align-items-center">
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
          @endif
        </div>
      @endforeach
    </div>
  </div>
</div>