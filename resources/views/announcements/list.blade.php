@include('shared.pagination')
  @foreach ($list as $data)
    <a class="text-dark text-decoration-none" href="#">
      <div class="card shadow-sm mb-2 w-100">
        <div class="card-body">
          <div class="d-flex">
            <div class="flex-grow-1 ms-3">
              <div class="d-flex justify-content-start align-items-center">
                <div>
                  <h5 class="mb-3 text-dark text-decoration-none">{{ $data->title }}</h5>
                  <p class="text-dark text-decoration-none">{{ $data->body }}</p>
                  <p class="mb-0"><i class='bx bx-user'></i> {{ $data->user->first_name }} {{ $data->user->last_name }} &nbsp;&nbsp;&nbsp; <i class='bx bx-calendar-alt'></i> {{ $data->created_at->format('M d, Y g:i A') }} 
                    @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
                      <i class='bx bx-barcode-reader'></i> {{ $data->subjectCode->name }}
                    @endif
                  </p>
                </div>
              </div>
            </div>
            @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
            <div>
              <div class="d-flex justify-content-center">
                @include('shared.edit-announcement')
                @include('shared.delete-item', ['class' => '', 'type' => 'Announcement', 'id' => $data->id, 'url' => route('announcements.delete')])
              </div>
            </div>
            @endif
          </div>
        </div>
      </div>
    </a>
  @endforeach
@include('shared.pagination')