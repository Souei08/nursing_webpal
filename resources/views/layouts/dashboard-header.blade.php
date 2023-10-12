  <header class="header body-pd" id="header">
    <div class="header_toggle text-dark"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    <div class="d-flex justify-content-center align-items-center">
      <div class="header_img rounded-circle me-2"> <img src="{{ \App\Helpers\Utils::getCurrentURL() . '/' . auth()->user()->photo }}" alt=""></div>
      <h5 class="mb-0 text-dark">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h5>
    </div>
  </header>