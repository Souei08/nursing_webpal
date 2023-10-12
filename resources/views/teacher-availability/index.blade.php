@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h3 class="mb-0">Appointment Date</h3>
      <div>
        @include('shared.create-schedule')
      </div>
    </div>
    <div class="card border-0 shadow-sm">
      <div class="card-body p-5">
        <div class="p-3 border-bottom">
          <div class="row">
            <div class="col-4">
              <h5 class="mb-0 text-muted">Day</h5>
            </div>
            <div class="col-8">
              <h5 class="mb-0 text-muted">Time</h5>
            </div>
          </div>
        </div>
        @for($i = 0; $i < 7; $i++)
          <div class="p-3 border-bottom">
            <div class="row">
              <div class="col-4">
                <h5 class="mb-0">{{ \Carbon\Carbon::getDays()[$i] }}</h5>
              </div>
              <div class="col-8">
                @php
                  $schedules = $data->filter(function($schedule) use ($i) { return $schedule->day === $i; });
                @endphp
                @if(count($schedules))
                <div class="d-flex justify-content-start align-items-start">
                  @foreach($schedules as $schedule)
                    <div class="position-relative ps-3 pe-3 pt-2 pb-2 border rounded d-flex me-3 justify-content-center align-items-center" style="">
                      {{ date("g:i A", strtotime($schedule->time_start)) }} - {{ date("g:i A", strtotime($schedule->time_end)) }}
                      <form method="POST" action="{{ route('teacher-availability.delete') }}" data-ajax="true">
                        <input type="hidden" name="id" value="{{ $schedule->id }}">
                        <button class="position-absolute top-0 start-100 translate-middle text-danger rounded-circle" style="width: 25px; height: 25px; font-size: 25px;">
                          <i class='bx bxs-x-circle'></i>
                        </button>
                      </form>
                    </div>
                  @endforeach
                </div>
                @else
                  <p class="mb-0 text-muted">Not Available</p>
                @endif
              </div>
            </div>
          </div>
        @endfor
      </div>
    </div>
  </div>
@endsection
@section('javascript')
@endsection