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
                            Integumentary System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-integumentary-system') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="is_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (integumentarySystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (integumentarySystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (integumentarySystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <b>Color:</b>
                            @include('generate.input', [
                                'label' => 'Specify',
                                'name' => 'is_color_specify',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                Pressure Ulcer Risk Assessment Tool
                            </b>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Score',
                                'name' => 'is_score',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Score',
                                'name' => 'is_risk_lvl',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>



                        <div class="col-sm-12 mt-3">
                            <b>
                                Interventions:
                            </b>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="changePosition" name="is_change_position"
                                value="true">
                            <label class="form-check-label" for="changePosition">
                                Change Position
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="airMattress" name="is_air_mattress"
                                value="true">
                            <label class="form-check-label" for="airMattress">
                                Air mattress
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="dressing" name="is_dressing"
                                value="true">
                            <label class="form-check-label" for="dressing">
                                Dressing
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="medication" name="is_medication"
                                value="true">
                            <label class="form-check-label" for="medication">
                                Medication
                            </label>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'is_intervention_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                Skin Turgor:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="good" name="is_skin_tugor_good"
                                value="true">
                            <label class="form-check-label" for="good">
                                Good
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="poor" name="is_skin_tugor_poor"
                                value="true">
                            <label class="form-check-label" for="poor">
                                Poor
                            </label>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Skin Integrity:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="intact" name="is_integrity_intact"
                                value="true">
                            <label class="form-check-label" for="intact">
                                Intact
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="nonIntact" name="is_integrity_nonintact"
                                value="true">
                            <label class="form-check-label" for="nonIntact">
                                Non-intact
                            </label>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'is_others',
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
