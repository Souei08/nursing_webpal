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
                            Respiratory System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-respiratory-system') }}" method="POST" data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="rs_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (RespiratorySystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (RespiratorySystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (RespiratorySystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <b>
                                Breath Sounds:
                            </b>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="clear"
                                name="rs_clear" value="true">
                            <label class="form-check-label" for="clear">
                                Clear
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="locationR"
                                name="rs_location_r" value="true">
                            <label class="form-check-label" for="locationR">
                                Location R
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="locationL"
                                name="rs_location_l" value="true">
                            <label class="form-check-label" for="locationL">
                                Location L
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="locationAdventitous"
                                name="rs_location_adventitous" value="true">
                            <label class="form-check-label" for="locationAdventitous">
                                Adventitous
                            </label>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Specify',
                                'name' => 'rs_adventitous_specify',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Location',
                                'name' => 'rs_location',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'LPM',
                                'name' => 'rs_lpm',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Via',
                                'name' => 'rs_via',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="oxygen"
                                name="rs_oxygen" value="true">
                            <label class="form-check-label" for="oxygen">
                                Oxygen
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="intubated"
                                name="rs_intubated" value="true">
                            <label class="form-check-label" for="intubated">
                                Intubated
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="cpap"
                                name="rs_cpap" value="true">
                            <label class="form-check-label" for="cpap">
                                CPAP
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="bipap"
                                name="rs_bipap" value="true">
                            <label class="form-check-label" for="bipap">
                                BIPAP
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="rs_et_tube" name="rs_et_tube"
                                value="true">
                            <label class="form-check-label" for="rs_et_tube">
                                ET Tube
                            </label>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Size',
                                'name' => 'rs_size',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Level',
                                'name' => 'rs_level',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12">
                            <b>
                                MV:
                            </b>
                        </div>


                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'F102',
                                'name' => 'rs_f',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'RR',
                                'name' => 'rs_rr',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'PEEP',
                                'name' => 'rs_peep',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'TV',
                                'name' => 'rs_tv',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'IE',
                                'name' => 'rs_ie',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            @include('generate.input', [
                                'label' => 'Sat',
                                'name' => 'rs_sat',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'rs_others',
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
