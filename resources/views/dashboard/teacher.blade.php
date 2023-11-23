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
</div>