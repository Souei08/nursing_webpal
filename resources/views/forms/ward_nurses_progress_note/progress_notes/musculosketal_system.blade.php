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
                            Musculosketal System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-musculosketal-system') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="ms_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (musculosketalSystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (musculosketalSystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (musculosketalSystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Posture:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="posture" name="ms_posture" value="true">
                            <label class="form-check-label" for="posture">
                                Normal
                            </label>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'ms_posture_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-12 mt-3">
                            <b>
                                Gait:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="gait" name="ms_gait" value="true">
                            <label class="form-check-label" for="gait">
                                Normal
                            </label>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'ms_gait_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                        <div class="col-sm-12 mt-3">
                            <b>
                                ROM:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="rom" name="ms_rom" value="true">
                            <label class="form-check-label" for="rom">
                                Normal
                            </label>
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'ms_rom_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Assistive Device',
                                'name' => 'ms_assistive_device',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Contraption',
                                'name' => 'ms_contraption',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'MFS score',
                                'name' => 'ms_mfs_score',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                Side-rails:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="yes" name="ms_mfs_side_rails_yes"
                                value="true">
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="no" name="ms_mfs_side_rails_no"
                                value="true">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>


                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'ms_others',
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
