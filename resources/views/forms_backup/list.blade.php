@include('shared.pagination')
  <div class="row mb-3">
    @foreach ($list as $data)
      <div class="col-md-4 d-flex align-items-stretch position-relative">
        @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
          @include('shared.delete-item', ['style' => 'position: absolute; right: 20px; z-index: 999; top: 10px;', 'class' => 'ms-0 bg-white text-danger border-0', 'type' => 'Forms', 'id' => $data->id, 'url' => route('forms.delete')])
        @endif
        <a class="text-dark text-decoration-none w-100" href="{{ auth()->user()->role->slug === 'student' ? '#' : route('forms.edit', $data->id) }}" {{ auth()->user()->role->slug === 'student' ? 'data-bs-toggle=modal data-bs-target=#confirm-'.$data->id : ''  }}>
          <div class="card w-100 mb-3">
            <div class="card-body text-center">
              <h6 class="mb-0">{{ $data->title }}</h6>
            </div>
          </div>
        </a>
        @if(auth()->user()->role->slug === 'student')
          <div class="modal fade" id="confirm-{{ $data->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <h5 class="mb-4 text-center">Create new document for "{{ $data->title }}"? This form will save to files section.<h5>
                  <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                    <a href="{{ route('forms.duplicate', $data->id) }}" class="btn btn-primary ms-1" >Confirm</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    @endforeach
  </div>
@include('shared.pagination')