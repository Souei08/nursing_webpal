@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      @include('shared.breadcrumb')
      @if(auth()->user()->role->slug === 'admin' || auth()->user()->role->slug === 'teacher')
        <a class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#create-form">
          <i class="fa fa-plus"></i> Create Form
        </a>
        <div class="modal fade" id="create-form">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="d-flex justify-content-center align-items-center">
                  <a href="{{ route('forms.create', ['with_header' => true]) }}" class="btn btn-primary ms-1" >With Header</a>
                  <a href="{{ route('forms.create') }}" class="btn btn-primary ms-1" >Empty Document</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
    <div class="card border-0 shadow">
      <div class="card-header bg-white py-3">
        <div class="row">
          <div class="col-md-8 d-flex justify-content-start align-items-center">
            <h5 class="mb-0">Forms</h5>
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
          @include('forms.list')
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
@endsection