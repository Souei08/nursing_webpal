@extends('layouts.dashboard')
@section('print_script')
    <script>
        function printableArea(divName) {
            $("#PieChartColumn").hide();
            $("#PieChartImage").show();

            $("#barGraphISCanvas").hide();
            $("#barGraphISImageDiv").show();

            $("#barGraphIKCanvas").hide();
            $("#barGraphIKImageDiv").show();

            $("#barGraphCSCanvas").hide();
            $("#barGraphCSImageDiv").show();

            $('body').css('background-image', 'none');
            $('body').css('padding-top', '0');
            $("body").removeClass("body-pd");

            var printContents = document.getElementById(divName).innerHTML;
            document.body.innerHTML = printContents;

            window.print();
            document.location.reload();
        }
    </script>
@endsection


@section('content')
    <div class="modal fade" id="graphModal" tabindex="-1" aria-labelledby="graphModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="graphModalLabel">Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your graph information or descriptions here -->
                    <p><b>Informatics skills</b> <br> This kind of tasks examine/test the skills of the students on monitoring
                         the conditions of the patient by analyzing and evaluating the test procedures undergo by the patients.</p>
                    <p><b> Informatics knowledge </b><br> This kind of tasks test the knowledge of the students by using computer 
                        technologies to deploy information sciences in order to practice their informatics skills.</p>
                    <p><b>Computer Skills</b> <br> This tasks is to test the ability of the students in using basic computer 
                        skills and related technologies to perform informatics skills. The ability of performing the informatics skills 
                        is to navigate the internet and use of common software application.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="modal-button">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#graphModal">
                Description
            </button>
        </div>
        <!-- Rest of your content -->
    </div>
    <style>
        .modal-button {
            position: absolute;
            top: 20 px;
            right: 200px;
            z-index: 1;
            /* Make sure it's on top of other content */
        }
    </style>
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
            <div class="d-flex justify-content-between align-items-center">
                @if ($tab === 'students')
                    <div class="me-2" style="width: 150px;">
                        <div class="dropdown" style="width: 150px;">
                            <button style="width: 160px;" class="btn btn-primary dropdown-toggle" type="button"
                                data-bs-toggle="dropdown" aria-expanded="true">
                                <i class="fas fa-chart-bar"></i>
                                {{ empty($graph) ? 'Choose Graph' : ucwords($graph) . ' Chart' }}
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="?tab=students">Table</a></li>
                                {{-- <li><a class="dropdown-item" href="?tab=students&graph=line">Line Chart</a></li> --}}
                                <li><a class="dropdown-item" href="?tab=students&graph=bar">Bar Chart</a></li>
                                {{-- <li><a class="dropdown-item" href="?tab=students&graph=pie">Pie Chart</a></li> --}}
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if (auth()->user()->role->slug === 'teacher')
            <div class="row text-center mb-3">
                @foreach ([['Informatics Skill', 'informatics.png'], ['Informatics Knowledge', 'book.png'], ['Computer Skills', 'desktop-computer.png']] as $taskCategory)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('tasks.create', ['subject_code_id' => $data->id, 'category' => $taskCategory[0]]) }}"
                            class="text-decoration-none text-dark" role="button">
                            <div class="counter hvr-grow w-100 d-flex justify-content-between align-items-center p-3">
                                <img src="{{ asset('images/icons/' . $taskCategory[1]) }}" class="fa-2x me-2">
                                <div>
                                    <h2 class="timer count-title count-number" data-to="100" data-speed="1500"
                                        style="font-size: 20px;">{{ $taskCategory[0] }}</h2>
                                    <p class="count-text text-end">Create Task</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">Subject Code</h5>
                    </div>
                    <div class="col-md-4">
                        <a onclick="printableArea('printableArea')" class="btn btn-primary pull-right">
                            <i class="fas fa-print"></i> Print
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-4" id="printableArea">
                <dl class="row">
                    <dt class="col-sm-3 text-muted">Subject Code</dt>
                    <dd class="col-sm-9 h6 text-dark">{{ $data->name }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3 text-muted">Year</dt>
                    <dd class="col-sm-9 h6 text-dark">{{ $data->start_year }} - {{ $data->end_year }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3 text-muted">Term</dt>
                    <dd class="col-sm-9 h6 text-dark">{{ $data->term }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3 text-muted">Semester</dt>
                    <dd class="col-sm-9 h6 text-dark">{{ $data->semester }}</dd>
                </dl>
                <dl class="row">
                    <dt class="col-sm-3 text-muted">Description</dt>
                    <dd class="col-sm-9 h6 text-dark">{{ $data->description }}</dd>
                </dl>
                <div class="search-data" data-url="{{ url()->full() }}" data-target="#datas" />
                <nav>
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link {{ $tab === 'students' ? 'active' : '' }}"
                                href="{{ route('subject-codes.show', ['id' => $data->id, 'tab' => 'students']) }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $tab === 'tasks' ? 'active' : '' }}"
                                href="{{ route('subject-codes.show', ['id' => $data->id, 'tab' => 'tasks']) }}">Tasks</a>
                        </li>
                    </ul>
                </nav>
                <div class="tab-content">

                    <div class="tab-pane fade w-100 pt-4 pb-4 {{ $tab === 'students' ? 'show active' : '' }}"
                        id="nav-students">
                        @if ($tab === 'students')
                            @if (!empty($graph))
                                @switch($graph)
                                    {{-- @case('line')
                                        <h4 class="mb-4">Line Chart</h4>
                                        @include('subject-codes.pie-line-chart')
                                    @break --}}

                                    @case('bar')
                                        <h4 class="mb-4">Bar Chart</h4>
                                        @include('subject-codes.bar_charts.informatics_skills')
                                        @include('subject-codes.bar_charts.informatics_knowledge')
                                        @include('subject-codes.bar_charts.computer_skills')





                                        {{-- @foreach (['Informatics Skill', 'Informatics Knowledge', 'Computer Skills'] as $chartCategory)
                                            @include('subject-codes.bar-chart', [
                                                'category' => $chartCategory,
                                            ])
                                        @endforeach --}}
                                    @break

                                    {{-- @case('pie')
                                        <h4 class="mb-4">Pie Chart</h4>
                                        @include('subject-codes.pie-line-chart')
                                    @break --}}

                                    @default
                                        Default case...
                                @endswitch
                            @else
                                <div id="datas">
                                    @include('subject-codes.students')
                                </div>
                            @endif
                        @endif
                    </div>

                    <div class="tab-pane fade w-100 pt-4 pb-4 {{ $tab === 'tasks' ? 'show active' : '' }}" id="nav-tasks">
                        @if ($tab === 'tasks')
                            <div id="datas">
                                @include('subject-codes.tasks')
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        $(function() {
            $("#PieChartImage").hide();
            $("#barGraphISImageDiv").hide();
            $("#barGraphIKImageDiv").hide();
            $("#barGraphCSImageDiv").hide();
        })
    </script>
@endsection
