@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-start mb-3">
      @include('shared.breadcrumb')
      @if($type === 'teachers')
      <div>
        @include('shared.create-user')
      </div>
      @endif
    </div>
    <div class="card border-0 shadow-sm">
      <div class="card-header bg-white py-3">
        <div class="row">
          <div class="col-md-5 d-flex justify-content-start align-items-center">
            <h5 class="mb-0">{{ ucwords($type) }}</h5>
          </div>
          <div class="col-md-3">
            @if(auth()->user()->role->slug === 'teacher' && $type === 'students')
             <div class="dropdown">
              <button class="btn w-100 btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $category ?? 'All Subject Code' }}
              </button>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('users.list', ['type' => $type]) }}">ALL</a></li>
                @foreach($subjectCodes as $subjectCode)
                  <li><a class="dropdown-item" href="{{ route('users.list', ['type' => $type, 'subject_code' => $subjectCode->name]) }}">{{ $subjectCode->name }}</a></li>
                @endforeach
              </ul>
            </div>
            @endif
          </div>
          <div class="col-md-4">
            <div class="input-group">
              <input 
                type="text" 
                class="form-control search-data border-right-0"
                data-url="{{ url()->full() }}"
                data-target="#datas"
                placeholder="Search ..." 
              >
              <div class="input-group-append">
                <button class="btn btn-outline-secondary border-left-0 border bg-white" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div id="datas">
          @include('users.list')
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
@endsection