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
                            Level of Consciousness
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-level-of-conciousness') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="lvl_of_consciousness_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (levelOfConsciousnessShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (levelOfConsciousnessShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (levelOfConsciousnessShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="conscious"
                                name="lvl_of_consciousness_conscious" value="true">
                            <label class="form-check-label" for="conscious">
                                Conscious
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="lethargic"
                                name="lvl_of_consciousness_lethargic" value="true">
                            <label class="form-check-label" for="lethargic">
                                Lethargic
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="stupor"
                                name="lvl_of_consciousness_stupor" value="true">
                            <label class="form-check-label" for="stupor">
                                Stupor
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="obtunded"
                                name="lvl_of_consciousness_obtunded" value="true">
                            <label class="form-check-label" for="obtunded">
                                Obtunded
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="coma" name="lvl_of_consciousness_coma"
                                value="true">
                            <label class="form-check-label" for="coma">
                                Coma
                            </label>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-check-input" type="checkbox" id="onSedation"
                                name="lvl_of_consciousness_on_sedation" value="true">
                            <label class="form-check-label" for="onSedation">
                                On-sedation
                            </label>
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                GCS:
                            </b>
                        </div>


                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'E',
                                'name' => 'lvl_of_consciousness_e',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'V',
                                'name' => 'lvl_of_consciousness_v',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => 'M',
                                'name' => 'lvl_of_consciousness_m',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-3">
                            @include('generate.input', [
                                'label' => '= ?/15',
                                'name' => 'lvl_of_consciousness_equal',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'lvl_of_consciousness_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>


                    </div>
                </div>
                <div class="card-footer bg-white py-3">
                    <div class="d-flex justify-content-end align-items-center">
                        <a class="btn btn-dark me-2" href="{{ route('ward_nurses_progress_notes.show', request('id')) }}">Cancel</a>
                        <button class="btn btn-primary me-2" type="submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
