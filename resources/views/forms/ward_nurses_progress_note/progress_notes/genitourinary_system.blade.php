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
                            Genitourinary System
                        </h5>
                    </div>
                    <div class="col-md-4">
                    </div>
                </div>
            </div>
            <form action="{{ route('ward_nurses_progress_notes.add-genitourinary-system') }}" method="POST"
                data-ajax="true">
                <div class="card-body p-4">
                    <div class="row">
                        <input type="hidden" name="ward_nurses_progress_note_id" value="{{ request('id') }}">

                        <div class="col-sm-12 mb-2">
                            <div class="form-group">
                                <label for="shift">
                                    Shift
                                </label>
                                <select class="form-select" name="gen_shift" id="shift"
                                    aria-label="Default select example">
                                    @if (genitourinarySystemShiftAvailability(request('id'), 'AM Shift'))
                                        <option>AM Shift</option>
                                    @endif
                                    @if (genitourinarySystemShiftAvailability(request('id'), 'PM Shift'))
                                        <option>PM Shift</option>
                                    @endif
                                    @if (genitourinarySystemShiftAvailability(request('id'), 'NOC Shift'))
                                        <option>NOC Shift</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="freely" name="gen_freely" value="true">
                            <label class="form-check-label" for="freely">
                                Freely
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="incontinence" name="gen_incontinence"
                                value="true">
                            <label class="form-check-label" for="incontinence">
                                Incontinence
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="dysuria" name="gen_dysuria"
                                value="true">
                            <label class="form-check-label" for="dysuria">
                                Dysuria
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <input class="form-check-input" type="checkbox" id="anuria" name="gen_anuria" value="true">
                            <label class="form-check-label" for="anuria">
                                Anuria
                            </label>
                        </div>


                        <div class="col-sm-12 mt-3">
                            <b>
                                Urine Color:
                            </b>
                        </div>

                        <div class="col-sm-5">
                            <input class="form-check-input" type="checkbox" id="urineColorClear"
                                name="gen_urine_color_clear" value="true">
                            <label class="form-check-label" for="urineColorClear">
                               Clear
                            </label>
                        </div>

                        <div class="col-sm-7">
                            @include('generate.input', [
                                'label' => 'Others',
                                'name' => 'gen_urine_color_clear_others',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12 mt-3">
                            <b>
                                Catheterized:
                            </b>
                        </div>

                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="yes" name="gen_catheterized_yes"
                                value="true">
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                        <div class="col-sm-6">
                            <input class="form-check-input" type="checkbox" id="no" name="gen_catheterized_no"
                                value="true">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Fr',
                                'name' => 'gen_fr',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'Date of insertion',
                                'name' => 'gen_date_insertion',
                                'type' => 'date',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-12">
                            @include('generate.input', [
                                'label' => 'others',
                                'name' => 'gen_others',
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
