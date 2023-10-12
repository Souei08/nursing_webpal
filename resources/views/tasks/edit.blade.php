@extends('layouts.dashboard')
@section('content')
  <div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
      @include('shared.breadcrumb')
    </div>
    <form action="{{ route('tasks.update', $data->id) }}" method="POST" data-ajax="true">
      <div class="card border-0 shadow">
        <div class="card-header bg-white py-3">
          <div class="row">
            <div class="col-md-8 d-flex justify-content-start align-items-center">
              <h5 class="mb-0">Edit Task</h5>
            </div>
            <div class="col-md-4">
            </div>
          </div>
        </div>      
        <div class="card-body p-4">
          @csrf
          <input type="hidden" name="subject_code_id" value="{{ $data->subject_code_id }}">
          <input type="hidden" name="category" value="{{ $data->category }}">
          <div class="row">
            <div class="col-md-6">
              @include('generate.input', [
                'label' => 'Title',
                'name' => 'title',
                'value' => $data->title,
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-6">
              @include('generate.input', [
                'type' => 'datetime-local',
                'label' => 'Deadline',
                'name' => 'deadline',
                'value' => $data->deadline,
                'formGroupClass' => 'mb-3'
              ])
            </div>
          </div>
          @include('generate.textarea', [
            'label' => 'Instructions',
            'name' => 'instructions',
            'value' => $data->instructions,
            'inputClass' => 'd',
            'labelClass' => 'mb-0'
          ])
          @include('generate.textarea', [
            'label' => 'Scenario',
            'name' => 'scenario',
            'value' => $data->scenario,
            'inputClass' => 'd',
            'labelClass' => 'mb-0'
          ])
          <div class="mb-3">
            <label class="form-label">File Attachment</label>
            <input class="form-control" type="file" name="file">
          </div>
          @foreach($data->taskFiles as $file)
            @php
              $extention = explode(".", $file->files_file_name);
              $extention = end($extention);
            @endphp
            <div>
            @switch($extention)
                @case('docx')
                    <img src="{{ asset('images/docx.png') }}" width="20" class="me-2">
                    @break
                @case('pdf')
                   <img src="{{ asset('images/pdf.png') }}" width="20" class="me-2">
                    @break
                @default
                    <img src="{{ asset('images/image.png') }}" width="20" class="me-2">
            @endswitch
              <a href="{{ asset('files/tasks/' . $file->files_file_name) }}" target="_blank" download="{{ substr($file->files_file_name, 13) }}" rel="noopener noreferrer">
                {{ substr($file->files_file_name, 13) }}
              </a>
              @if(auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                @include('shared.delete-item', ['class' => 'ms-0 bg-white text-danger border-0', 'type' => 'File', 'id' => $file->id, 'url' => route('tasks.delete.image')])
              @endif
            </div>
          @endforeach
        </div>
        <div class="card-footer bg-white py-3">
          <div class="d-flex justify-content-end align-items-center">
            <a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">Cancel</a>
            <button class="btn btn-primary" type="submit">Submit</button>
          </div>
        </div>
      </div>
    </form>
  </div>
@endsection
@section('javascript')
@endsection