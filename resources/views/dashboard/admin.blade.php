<div class="container-fluid">
  <div class="row mb-4">
    <div class="col-sm-8">
      <h3 class="mb-0">Dashboard</h3>
    </div>
    <div class="col-sm-4 d-flex justify-content-end align-items-center">
    </div>
  </div>
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="display-4 mb-0">Hi, {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h1>
  </div>
  <div class="row text-center mb-3">
    <div class="col-md-3 mb-3">
      <a href="{{ route('users.list', 'students') }}" class="text-decoration-none text-dark" role="button">
        <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
          <img src="{{ asset('images/icons/students.png') }}" class="fa-2x me-2">
          <div>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">{{ $students }}</h2>
            <p class="count-text">Students</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3 mb-3">
      <a href="{{ route('users.list', 'teachers') }}" class="text-decoration-none text-dark" role="button">
        <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
          <img src="{{ asset('images/icons/teacher.png') }}" class="fa-2x me-2">
          <div>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">{{ $teachers }}</h2>
            <p class="count-text">Teachers</p>
          </div>
        </div>
      </a>
    </div>
    <div class="col-md-3 mb-3">
      <a href="{{ route('subject-codes.list') }}" class="text-decoration-none text-dark" role="button">
        <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
          <img src="{{ asset('images/education.png') }}" class="fa-2x me-2">
          <div>
            <h2 class="timer count-title count-number" data-to="100" data-speed="1500">{{ $subject_codes }}</h2>
            <p class="count-text">Subject Codes</p>
          </div>
        </div>
      </a>
    </div>
  </div>
</div>