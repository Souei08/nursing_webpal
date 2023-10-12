@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      @include('shared.breadcrumb')
    </div>
    <div class="card border-0 shadow">
      <div class="card-header bg-white py-3">
        <div class="row">
          <div class="col-md-8 d-flex justify-content-start align-items-center">
            <h5 class="mb-0">Create {{ $category }} Task</h5>
          </div>
          <div class="col-md-4">
          </div>
        </div>
      </div>
      <form action="{{ route('tasks.store') }}" method="POST" data-ajax="true" enctype="multipart/form-data">
        <div class="card-body p-4">
          @csrf
          <input type="hidden" name="subject_code_id" value="{{ $data->id }}">
          <input type="hidden" name="category" value="{{ $category }}">
          <div class="row">
            <div class="col-md-6">
              @include('generate.input', [
                'label' => 'Title',
                'name' => 'title',
                'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-6">
            @include('generate.input', [
              'type' => 'datetime-local',
              'label' => 'Deadline',
              'name' => 'deadline',
              'value' => '',
              'formGroupClass' => 'mb-3'
            ])
            </div>
          </div>
          @include('generate.textarea', [
            'label' => 'Instructions',
            'name' => 'instructions',
            'value' => '',
            'inputClass' => 'd',
            'labelClass' => 'mb-0'
          ])
          @include('generate.textarea', [
            'label' => 'Scenario',
            'name' => 'scenario',
            'value' => '',
            'inputClass' => 'd',
            'labelClass' => 'mb-0'
          ])
          <div class="mb-3">
            <label class="form-label">File Attachment</label>
            <input class="form-control" type="file" name="file">
          </div>
        </div>
        <div class="card-footer bg-white py-3">
          <div class="d-flex justify-content-end align-items-center">
            <a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">Cancel</a>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection
@section('javascript')
@endsection