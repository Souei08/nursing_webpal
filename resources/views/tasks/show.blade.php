@extends('layouts.dashboard')
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Task</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        @if (auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                            @include('shared.delete-item', [
                                'class' => 'me-2',
                                'type' => 'SubjectCode',
                                'id' => $data->id,
                                'url' => route('tasks.delete'),
                            ])
                            <a class="btn btn-sm btn-success" href="{{ route('tasks.edit', $data->id) }}">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="mb-4">Task Description</h5>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Title</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->title }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Category</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->category }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Deadline</dt>
                            <dd class="col-sm-9 h6 text-dark">
                                {{ \Carbon\Carbon::parse($data->deadline)->format('M d, Y g:i A') }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Instructions</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->instructions }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Scenario</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->scenario }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Date Submitted</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ \Carbon\Carbon::parse($data->created_at)->format('M d, Y g:i A') }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Date Submitted</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ \Carbon\Carbon::parse($data->created_at)->format('M d, Y g:i A') }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">File Attachment</dt>
                            <dd class="col-sm-9 h6 text-dark">
                                @foreach ($data->taskFiles as $file)
                                    @php
                                        $extention = explode('.', $file->files_file_name);
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
                                        <a href="{{ asset('files/tasks/' . $file->files_file_name) }}" target="_blank"
                                            download="{{ substr($file->files_file_name, 13) }}"
                                            rel="noopener noreferrer">{{ substr($file->files_file_name, 13) }}</a>

                                        @if (auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                                            @include('shared.delete-item', [
                                                'class' => 'ms-0 bg-white text-danger border-0',
                                                'type' => 'File',
                                                'id' => $file->id,
                                                'url' => route('tasks.delete.image'),
                                            ])
                                        @endif
                                    </div>
                                @endforeach
                            </dd>
                        </dl>
                    </div>
                    <div class="col-md-5">
                        @if (auth()->user()->role->slug === 'teacher' || auth()->user()->role->slug === 'admin')
                            <h5 class="mb-4">Task Submissions
                                ({{ $data->taskSubmissions()->count() }}/{{ $data->subjectCode->students()->count() }})
                            </h5>
                            @foreach ($data->subjectCode->students as $student)
                                @php
                                    $submission = $data
                                        ->taskSubmissions()
                                        ->where(['user_id' => $student->user_id])
                                        ->first();
                                @endphp
                                <a class="text-dark text-decoration-none"
                                    href="{{ !empty($submission) ? route('task-submissions.show', $submission->id) : '#' }}">
                                    <div class="card shadow-sm mb-2 w-100">
                                        <div class="card-body p-3">
                                            <div class="d-flex">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        @if (!empty($submission))
                                                            <div style="width: 10px; height: 10px;"
                                                                class="bg-success me-3 rounded-circle"></div>
                                                        @else
                                                            <div style="width: 10px; height: 10px;"
                                                                class="bg-danger me-3 rounded-circle"></div>
                                                        @endif
                                                        <div>
                                                            <h6 class="mb-0 text-dark text-decoration-none">
                                                                {{ $student->user->first_name }}
                                                                {{ $student->user->last_name }}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if (!empty($submission) && $submission->status === 'Done')
                                                    <div>
                                                        <span class="badge text-bg-success">Done</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <h5 class="mb-4">Task Submission</h5>
                            @if ($data->is_active)
                                @if (empty($submission))

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('tasks.submission') }}" method="POST" data-ajax="true" enctype="multipart/form-data" class="custom-validation-form-students">
                                        <input type="hidden" name="task_id" value="{{ $data->id }}">
                                        @include('generate.textarea', [
                                            'label' => 'Description',
                                            'name' => 'description',
                                            'value' => '',
                                            'inputClass' => 'description-input',
                                            'labelClass' => 'mb-0',
                                        ])
                                        <div class="mb-3">
                                            <label class="form-label">File Attachment</label>
                                               <div id="drop-area" class="drop-area">
                                                    <div class="instructions">Drag &amp; Drop files here or click to select files</div>
                                                    <input 
                                                        class="form-control file-input-val" 
                                                        id="file-input" 
                                                        type="file" 
                                                        name="file[]" 
                                                        multiple   
                                                        onchange="handleFileSelect(event)"
                                                    >
                                                    <ul id="file-list" class="file-list"></ul>
                                                </div>
                                            <!-- <input class="form-control" type="file" name="file"> -->
                                        </div>

                                        <div class="d-flex justify-content-end align-items-center">
                                            <a class="btn btn-light me-2" href="{{ route('tasks.list') }}">Cancel</a>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#confirm">Upload</button>
                                        </div>
                                        <div class="modal fade" id="confirm">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0 pb-0">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mb-4 text-center">Are sure you want to submit?<h5>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1">Yes</button>
                                                                    <button type="button" class="btn btn-secondary ms-1"
                                                                        data-bs-dismiss="modal">No</button>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>    
                                @else
                                    <h6 class="mb-2 text-muted">Description</h6>
                                    <p>{{ $submission->description }}</p>
                                    <h6 class="mb-2 text-muted">File Attachment</h6>
                                    <div class="card mb-3">
                                        <div class="card-body p-3">
                                            @foreach ($submission->taskSubmissionFiles->sortByDesc('created_at') as $file)
                                                @php
                                                    $extention = explode('.', $file->files_file_name);
                                                    $extention = end($extention);
                                                @endphp
                                                <div>
                                                    @switch($extention)
                                                        @case('docx')
                                                            <img src="{{ asset('images/docx.png') }}" width="20"
                                                                class="me-2">
                                                        @break

                                                        @case('pdf')
                                                            <img src="{{ asset('images/pdf.png') }}" width="20"
                                                                class="me-2">
                                                        @break

                                                        @default
                                                            <img src="{{ asset('images/image.png') }}" width="20"
                                                                class="me-2">
                                                    @endswitch
                                                    {{-- <a href="{{ $file->file }}" target="_blank"
                                                        rel="noopener noreferrer">{{ $file->files_file_name }}</a> --}}
                                                    <a href="{{ asset('files/tasks/submissions/' . $file->files_file_name) }}"
                                                        target="_blank"
                                                        download="{{ substr($file->files_file_name, 13) }}"
                                                        rel="noopener noreferrer">
                                                        {{ substr($file->files_file_name, 13) }}
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <form action="{{ route('tasks.submission') }}" method="POST" data-ajax="true" enctype="multipart/form-data" class="custom-validation-form-students">
                                        <input type="hidden" name="task_id" value="{{ $data->id }}">
                                        @include('generate.textarea', [
                                            'label' => 'Description',
                                            'name' => 'description',
                                            'value' => '',
                                            'inputClass' => 'description-input',
                                            'labelClass' => 'mb-0',
                                        ])
                                        <div class="mb-3">
                                            <label class="form-label">File Attachment</label>
                                            <div id="drop-area" class="drop-area">
                                                <div class="instructions">Drag &amp; Drop files here or click to select files</div>
                                                <input 
                                                    class="form-control" 
                                                    id="file-input" 
                                                    type="file" 
                                                    name="file[]" 
                                                    multiple   
                                                    onchange="handleFileSelect(event)"
                                                >
                                                <ul id="file-list" class="file-list"></ul>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a class="btn btn-light me-2" href="{{ route('tasks.list') }}">Cancel</a>
                                            <button class="btn btn-primary" type="button" data-bs-toggle="modal"
                                                data-bs-target="#confirm">Resubmit</button>
                                        </div>
                                        <div class="modal fade" id="confirm">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header border-0 pb-0">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h5 class="mb-4 text-center">Are sure you want to resubmit?<h5>
                                                                <div
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1">Yes</button>
                                                                    <button type="button" class="btn btn-secondary ms-1"
                                                                        data-bs-dismiss="modal">No</button>
                                                                </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @if ($submission->status === 'Done')
                                        <h6 class="mb-4">Rating</h6>
                                        <p>{{ $submission->rating }}/10</p>
                                        <h6 class="mb-4">Comment</h6>
                                        <p>{{ $submission->comment }}</p>
                                    @endif
                                @endif
                            @else
                                <div class="alert alert-danger" role="alert">
                                    Task Expired
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white py-3">
                <div class="d-flex justify-content-end align-items-center">
                    <!--<a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">-->
                    <!--    <i class="fas fa-arrow-left"></i> Back-->
                    <!--</a>-->
                    <a class="btn btn-light me-2" href="{{ route('tasks.list') }}">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
