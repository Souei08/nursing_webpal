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
                        <h5 class="mb-0">Task Submission</h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('task-submissions.rate-and-comment', $data->id) }}" method="POST" data-ajax="true">
                @csrf
                <div class="card-body p-4">
                    <h5 class="mb-4">Task Description</h5>
                    <div class="mb-3">
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Category</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->task->category }}</dd>
                        </dl>
                        <dl class="row">
                            <dt class="col-sm-3 text-muted">Title</dt>
                            <dd class="col-sm-9 h6 text-dark">{{ $data->task->title }}</dd>
                        </dl>
                    </div>
                    <h5 class="mb-4">Submission</h5>
                    <div class="d-flex">
                        <h6 class="mb-2 text-muted" style="margin-right: 200px;">Description</h6>
                        <h6 class="mb-2 text-muted">{{ \Carbon\Carbon::parse($data->updated_at)->format('M d, Y g:i A') }}</h6>
                    </div>
                    <h6 class="mb-2 text-muted">File Attachment</h6>
                    <div class="mb-3">
                        @foreach ($data->taskSubmissionFiles->sortByDesc('created_at') as $file)
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
                    <h4 class="mb-4">Rating</h4>
                    <b>1 = 10% Poor:</b> The performance is significantly below expectations and requires major
                    improvements.<br>
                    <b>2 = 20% Below Average: </b>The performance is below average and needs notable enhancements.<br>
                    <b>3 = 30% Average:</b> The performance meets the basic requirements but lacks any outstanding
                    qualities.<br>
                    <b>4 = 40% Fair:</b> The performance is acceptable, but there is room for improvement to meet
                    expectations.<br>
                    <b>5 = 50% Good:</b> The performance is solid and meets expectations with satisfactory results.<br>
                    <b>6 = 60% Above Average: </b>The performance is above average and demonstrates notable strengths.<br>
                    <b>7 = 70% Very Good:</b> The performance is very good and surpasses expectations with commendable
                    results.<br>
                    <b>8 = 80% Excellent:</b> The performance is excellent and consistently achieves outstanding results.<br>
                    <b>9 = 90% Outstanding: </b>The performance is outstanding and exceeds expectations in every aspect.<br>
                    <b>10 = 100% Exceptional: </b>The performance is exceptional and sets a new standard of excellence.<br>
                    <br>
                    <div class="mb-3">
                        @if ($data->status === 'Pending')
                            {{-- //   @for ($i = 0; $i <= 100; $i += 10)             --}}
                            @for ($i = 1; $i <= 10; $i++)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="rating"
                                        value="{{ $i }}" id="rating-{{ $i }}">
                                    <label class="form-check-label"
                                        for="rating-{{ $i }}">{{ $i }}</label>
                                </div>
                            @endfor
                        @else
                            <p>{{ $data->rating }}/10</p>
                        @endif
                    </div>
                    <h5 class="mb-0">Comment</h5>
                    @if ($data->status === 'Pending')
                        @include('generate.textarea', [
                            'label' => '',
                            'name' => 'comment',
                            'value' => $data->comment,
                            'inputClass' => 'd',
                            'labelClass' => 'mb-0',
                        ])
                    @else
                        @include('generate.textarea', [
                            'label' => '',
                            'name' => 'comment',
                            'value' => $data->comment,
                            'inputClass' => 'd',
                            'labelClass' => 'mb-0',
                            'readonly' => true,
                        ])
                    @endif
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <!--<a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}"><i class="fas fa-arrow-left"></i> Back</a>-->
                        <!--<a class="btn btn-light me-2" href="{{ redirect()->back()->getTargetUrl() }}">-->
                        <!--    <i class="fas fa-arrow-left"></i> Back-->
                        <!--</a>-->
                        <a class="btn btn-light me-2" href="{{ route('tasks.list', $data->id) }}">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                        @if ($data->status === 'Pending')
                            <button class="btn btn-primary" type="submit">Submit</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('javascript')
@endsection
