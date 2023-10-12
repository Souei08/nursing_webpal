<div class="l-navbar show" id="nav-bar">
  <nav class="nav_">
    <div>
      <a href="/" class="nav_logo text-decoration-none w-100 text-center"> 
        <img src="{{ asset('images/logo.png') }}" width="30" height="30"> 
      </a>
      <div class="nav_list"> 
        <a href="{{ route('dashboard.index') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'dashboard.index' ? 'active' : '' }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> 
        </a>
        @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
        <a href="{{ route('subject-codes.list') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'subject-codes.list' ? 'active' : '' }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Subject Codes</span> 
        </a>
        @endif
        <a href="{{ route('tasks.list') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'tasks.list' ? 'active' : '' }}"> <i class='bx bx-news nav_icon'></i> <span class="nav_name">Tasks</span> </a>
        <a href="{{ route('forms.list') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'forms.list' ? 'active' : '' }}"> <i class='bx bxs-file-find nav_icon'></i> <span class="nav_name">Forms</span> </a>
        @if(auth()->user()->role->slug === 'student')
        {{-- <a href="{{ route('forms.files.list') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'forms.files.list' ? 'active' : '' }}"> <i class='bx bx-file nav_icon'></i> <span class="nav_name">Files</span> </a> --}}
        <a href="{{ route('instructor') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'instructor' ? 'active' : '' }}"> <i class='bx bxs-user-detail nav_icon'></i> <span class="nav_name">Instructor</span> 
        </a>
        @endif
        <a href="{{ route('announcements.list') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'announcements.list' ? 'active' : '' }}"> <i class='bx bxs-alarm-exclamation nav_icon'></i> <span class="nav_name">Announcements</span> </a>
        <a href="{{ route('inbox.index') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'inbox.index' ? 'active' : '' }}"> <i class='bx bxs-chat nav_icon'></i> <span class="nav_name">Messages</span> </a>
        @php
          $typeOfUsers = [
            [
              'type' => 'students',
              'icon' => 'bx bxs-user',
              'show' => (auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher'),
            ],
            [
              'type' => 'teachers',
              'icon' => 'bx bxs-user',
              'show' => auth()->user()->role->slug === 'admin',
            ],
            [
              'type' => 'admins',
              'icon' => 'bx bxs-cog',
              'show' => auth()->user()->role->slug === 'admin',
            ]
          ];
        @endphp
        @foreach($typeOfUsers as $type)
          @if($type['show'])
            <a href="{{ route('users.list', $type['type']) }}" class="nav_link text-white text-decoration-none {{ (Route::currentRouteName() === 'users.list' && request()->type === $type['type']) ? 'active text-white' : '' }}"> <i class="{{ $type['icon'] }} nav_icon"></i> <span class="nav_name">List of {{ ucwords($type['type']) }}</span> 
            </a>
          @endif
        @endforeach
        @if(auth()->user()->role->slug === 'teacher')
          <a href="{{ route('teacher-availability.index') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'teacher-availability.index' ? 'active' : '' }}"> <i class='bx bx-calendar nav_icon'></i> <span class="nav_name">Appointment Date</span> 
          </a>
        @endif
        <a href="{{ route('profile.index') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'profile.index' ? 'active' : '' }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Profile</span> 
        </a>
        <a href="{{ route('profile.change-password') }}" class="nav_link text-white text-decoration-none {{ Route::currentRouteName() === 'profile.change-password' ? 'active' : '' }}"> <i class='bx bx-lock-alt nav_icon'></i> <span class="nav_name">Change Password</span> 
        </a>
    </div>
    <a class="nav_link text-white text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#logout-confirm">
      <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
    </a>
  </nav>
</div>

<div class="modal fade" id="logout-confirm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="mb-4 text-center">Are sure you want to signout?<h3>
        <div class="d-flex justify-content-center align-items-center">
          <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancel</button>
          <a href="{{ route('logout') }}" class="btn btn-primary ms-1" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">
            Signout
          </a>
          <form id="logout-form-2" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</div>