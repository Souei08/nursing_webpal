<nav id="navbar-example2" class="navbar navbar-expand-md navbar-light bg-light shadow-sm fixed-top custom-nav d-print-none">
  <div class="container-fluid">
    @if($dashboard)
    <div class="custom-menu me-3 d-sm-block d-md-none d-lg-none">
      <button type="button" id="sidebarCollapse" class="btn btn-link text-decoration-none">
        <i class="fa fa-bars"></i>{{'  '}}Menu
      </button>
    </div>
    @endif
    <a class="navbar-brand" href="{{ route('index') }}">
      <img src="{{ asset('images/logo.png') }}" width="30" class="me-2">
      {{ config('app.name', 'Laravel') }}
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav me-auto">
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ms-auto">
        @if(!$dashboard)
          @if(auth()->check())
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">{{ __('Dashboard') }}</a>
          </li>
          @endif
        @endif
        <!-- Authentication Links -->
        @guest
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register', ['type' => 'student']) }}">{{ __('Register') }}</a>
          </li>
          @endif
        @else
        <li class="nav-item dropdown d-none d-sm-none d-md-block d-lg-block">
          <a id="navbarDropdown" class="nav-link dropdown-toggle me-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          <img src="{{ asset(auth()->user()->photo) }}" width="30" height="30" class="rounded-circle mx-2 bg-secondary">
          {{ auth()->user()->first_name }} {{ auth()->user()->last_name }} <br />
          <small class="d-none">{{ auth()->user()->role->name }}</small>
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('profile.index') }}">
            {{ __('Profile') }}
            </a>
            <a class="dropdown-item" href="{{ route('profile.change-password') }}">
            {{ __('Change Password') }}
            </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>