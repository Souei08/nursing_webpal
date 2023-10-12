@extends('layouts.dashboard')
@section('styles')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-3">
            @include('shared.breadcrumb')
        </div>
        <div class="card border-0 shadow">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col-md-8 d-flex justify-content-start align-items-center">
                        <h5 class="mb-0">
                            <i class="fa fa-plus"></i>
                            Pain Assessment
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-pain-assessment') }}" method="POST" data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="pa_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (painAssessmentShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (painAssessmentShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (painAssessmentShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Presence of Pain:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="yes" name="pa_pain_yes"
                                value="true">
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="no" name="pa_pain_no" value="true">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>

                        <div class="col-sm-6 mt-3">
                            Pain of Score: _____/10
                            @include('generate.input', [
                                'name' => 'pa_score',
                                'type' => 'number',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6 mt-3">
                            @include('generate.input', [
                                'label' => 'Tool Used',
                                'name' => 'pa_tool_used',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>







                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="pattern" name="pa_tool_pattern"
                                value="true">
                            <label class="form-check-label" for="pattern">
                                Pattern
                            </label>
                            @include('generate.input', [
                                'name' => 'pa_tool_pattern_blank',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="quality" name="pa_tool_quality"
                                value="true">
                            <label class="form-check-label" for="quality">
                                Quality
                            </label>
                            @include('generate.input', [
                                'name' => 'pa_tool_quality_blank',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="region" name="pa_tool_region"
                                value="true">
                            <label class="form-check-label" for="region">
                                Region
                            </label>
                            @include('generate.input', [
                                'name' => 'pa_tool_region_blank',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="severity" name="pa_tool_severity"
                                value="true">
                            <label class="form-check-label" for="severity">
                                Severity
                            </label>
                            @include('generate.input', [
                                'name' => 'pa_tool_severity_blank',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'pa_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2"
                            href="{{ route('ward_nurses_progress_notes.show', request('id')) }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
