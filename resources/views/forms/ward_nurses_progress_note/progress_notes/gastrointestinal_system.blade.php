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
                            Gastrointestinal System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-gastrointestinal-system') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="gas_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (gastrointestinalSystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (gastrointestinalSystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (gastrointestinalSystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Diet',
                                'name' => 'gas_diet',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="oral" name="gas_oral" value="true">
                            <label class="form-check-label" for="oral">
                                Oral
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="apetite" name="gas_apetite"
                                value="true">
                            <label class="form-check-label" for="apetite">
                                Appetite
                            </label>
                        </div>
                        <div class="col-sm-2">
                            <input class="form-check-input" type="checkbox" id="good" name="gas_good" value="true">
                            <label class="form-check-label" for="good">
                                Good
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="fair" name="gas_fair" value="true">
                            <label class="form-check-label" for="fair">
                                Fair
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="minimal" name="gas_minimal"
                                value="true">
                            <label class="form-check-label" for="minimal">
                                Minimal
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="ngt" name="gas_ngt" value="true">
                            <label class="form-check-label" for="ngt">
                                NGT
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="r" name="gas_r" value="true">
                            <label class="form-check-label" for="r">
                                R
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="l" name="gas_l" value="true">
                            <label class="form-check-label" for="l">
                                L
                            </label>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="peg" name="gas_peg" value="true">
                            <label class="form-check-label" for="peg">
                                PEG
                            </label>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'French',
                                'name' => 'gas_french',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date/Time Inserted',
                                'name' => 'gas_date_time',
                                'type' => 'datetime-local',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Bowel Sounds:
                            </b>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="bowelSoundYes"
                                name="gas_bowel_sound_yes" value="true">
                            <label class="form-check-label" for="bowelSoundYes">
                                Yes
                            </label>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="bowelSoundNo" name="gas_bowel_sound_no"
                                value="true">
                            <label class="form-check-label" for="bowelSoundNo">
                                No
                            </label>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'gas_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
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
