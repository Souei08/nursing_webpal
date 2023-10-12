<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-sm-8">
      <h3 class="mb-0">Dashboard</h3>
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-4 mb-0">Hi, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
  </div>
  <div class="row text-center mb-3">
    <div class="col-md-3 mb-3">
      <a href="#" class="text-decoration-none text-dark" role="button">
        <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
          <img src="{{ asset('images/education.png') }}" class="fa-2x me-2">
          <div>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">{{ $undone }}</h2>
            <p class="count-text">Undone Tasks</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3 mb-3">
      <a href="#" class="text-decoration-none text-dark" role="button">
        <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
          <img src="{{ asset('images/education.png') }}" class="fa-2x me-2">
          <div>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">{{ $finished }}</h2>
            <p class="count-text">Finished Task</p>
          </div>
        </div>
      </a>
    </div>
  </div>
  <h4 class="mb-3">Latest Announcement</h4>
  @if(! empty($announcement))
    <div class="alert alert-success bg-success" role="alert">
      <h4 class="alert-heading text-white">{{ $announcement->title }}</h4>
      <p></p>
      <hr>
      <p class="mb-0 text-white">{{ $announcement->body }}</p>
    </div>
  @else
    <p>No Announcement Yet</p>
  @endif
  <div class="">
    <h4 class="mb-3">Latest Tasks</h4>
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