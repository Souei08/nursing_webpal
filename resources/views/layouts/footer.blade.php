<div class="container-fluid bg-white">
  <footer class="p-3">
    <div class="row">
      <div class="col d-flex align-items-center justify-content-start">
        <p class="mb-0 text-muted">All rights reserved.&copy; 2022 {{ config('app.name', '') }}</p>
      </div>
      <div class="col d-flex align-items-center justify-content-end">
        <ul class="nav">
          <li class="nav-item"><a href="#" data-bs-toggle="modal" data-bs-target="#onload" class="nav-link px-2 text-muted">Privacy Policy</a></li>
          <li class="nav-item"><a href="{{ route('terms-of-use') }}" class="nav-link px-2 text-muted">Terms of Use</a></li>
        </ul>
      </div>
    </div>
  </footer>
</div>