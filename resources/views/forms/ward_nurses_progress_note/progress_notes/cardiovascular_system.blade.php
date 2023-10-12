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
                            Cardiovascular System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-cardiovascular-system') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="cs_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (cardiovascularSystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (cardiovascularSystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (cardiovascularSystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Pulses:
                            </b>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="regular" name="cs_regular" value="true">
                            <label class="form-check-label" for="regular">
                                Regular
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="irregular" name="cs_irregular"
                                value="true">
                            <label class="form-check-label" for="irregular">
                                Irregular
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="weak" name="cs_weak" value="true">
                            <label class="form-check-label" for="weak">
                                Weak
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="bounding" name="cs_bounding"
                                value="true">
                            <label class="form-check-label" for="bounding">
                                Bounding
                            </label>
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                CRT:
                            </b>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'secs',
                                'name' => 'cs_secs',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                Edema:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="no" name="cs_no" value="true">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="yes" name="cs_yes" value="true">
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>



                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Location',
                                'name' => 'cs_location',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'cs_others',
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
