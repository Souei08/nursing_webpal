<form method="POST" action="{{ route('fluid_balance_sheet_form.edit-third-shift') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-third-shift-{{ $thirdShift->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit 10-6 Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $thirdShift->id }}">

                    <b>INTAKE</b>

                    <div class="row">
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'IVF 1',
                                'name' => 'third_shift_ivf_one',
                                'value' => $thirdShift->third_shift_ivf_one,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'IVF 2',
                                'name' => 'third_shift_ivf_two',
                                'value' => $thirdShift->third_shift_ivf_two,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>

                    @include('generate.input', [
                        'label' => 'OTHERS',
                        'name' => 'third_shift_intake_others',
                        'value' => $thirdShift->third_shift_intake_others,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'BLOOD',
                        'name' => 'third_shift_blood',
                        'value' => $thirdShift->third_shift_blood,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'TPN',
                        'name' => 'third_shift_tpn',
                        'value' => $thirdShift->third_shift_tpn,
                        'formGroupClass' => 'mb-3',
                    ])

                    <div class="row">
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'TUBE',
                                'name' => 'third_shift_tube',
                                'value' => $thirdShift->third_shift_tube,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'ORAL',
                                'name' => 'third_shift_oral',
                                'value' => $thirdShift->third_shift_oral,
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>



                    <b>OUTPUT</b>

                    @include('generate.input', [
                        'label' => 'URINE',
                        'name' => 'third_shift_urine',
                        'value' => $thirdShift->third_shift_urine,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'DRAIN',
                        'name' => 'third_shift_drain',
                        'value' => $thirdShift->third_shift_drain,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'STOOL',
                        'name' => 'third_shift_stool',
                        'value' => $thirdShift->third_shift_stool,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'OTHERS',
                        'name' => 'third_shift_output_others',
                        'value' => $thirdShift->third_shift_output_others,
                        'formGroupClass' => 'mb-3',
                    ])

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>
</form>
