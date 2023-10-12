@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      @include('shared.breadcrumb')
    </div>
    <div class="card border-0 shadow">
      <div class="card-header bg-white py-3">
        <h5 class="mb-0">Instructor</h5>
      </div>
      <div class="card-body">
        <dl class="row">
          <dt class="col-sm-3 text-muted">Course Coordinator</dt>
          <dd class="col-sm-9 h6 text-dark">{{ auth()->user()->studentProfile->subjectCode->user->first_name }} {{ auth()->user()->studentProfile->subjectCode->user->last_name }}</dd>
        </dl>
        <dl class="row">
          <dt class="col-sm-3 text-muted">Email</dt>
          <dd class="col-sm-9 h6 text-dark">{{ auth()->user()->studentProfile->subjectCode->user->email ?? 'N/A' }}</dd>
        </dl>

        <dl class="row">
          <dt class="col-sm-3 text-muted">Department/Program</dt>
          <dd class="col-sm-9 h6 text-dark">{{ auth()->user()->studentProfile->subjectCode->user->teacherProfile->department ?? 'N/A' }}</dd>
        </dl>

        <dl class="row">
          <dt class="col-sm-3 text-muted">Student Consultation</dt>
          <dd class="col-sm-9 h6 text-dark">By appointment</dd>
        </dl>
        <dl class="row">
          <dt class="col-sm-3 text-muted">Appointment Date</dt>
          <dd class="col-sm-9 h6 text-dark">
            <div class="card">
              <div class="card-body">
                @for($i = 0; $i < 7; $i++)
                  <div class="p-3 border-bottom">
                    <div class="row">
                      <div class="col-2">
                        <h6 class="mb-0">{{ \Carbon\Carbon::getDays()[$i] }}</h6>
                      </div>
                      <div class="col-10">
                        @php
                          $schedules = auth()->user()->studentProfile->subjectCode->user->teacherAvailability()->get()->filter(function($schedule) use ($i) { return $schedule->day === $i; });
                        @endphp
                        @if(count($schedules))
                        <div class="d-flex justify-content-start align-items-start">
                          @foreach(auth()->user()->studentProfile->subjectCode->user->teacherAvailability()->get()  as $schedule)
                            <div class="position-relative ps-3 pe-3 pt-2 pb-2 border rounded d-flex me-3 justify-content-center align-items-center" style="">
                              {{ date("g:i A", strtotime($schedule->time_start)) }} - {{ date("g:i A", strtotime($schedule->time_end)) }}
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
          </dd>
        </dl>
        <dl class="row">
          <dt class="col-sm-3 text-muted">Phone</dt>
          <dd class="col-sm-9 h6 text-dark">{{ auth()->user()->studentProfile->subjectCode->user->contact_no ?? 'N/A' }}</dd>
        </dl>
      </div>
    </div>
  </div>
@endsection