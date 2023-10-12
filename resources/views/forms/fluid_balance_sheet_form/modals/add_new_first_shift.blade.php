<form method="POST" action="{{ route('fluid_balance_sheet_form.add-new-first-shift') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="add-new-first-shift">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New 6-2 Shift</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $fluidBalanceSheetForm->id }}">

                    <b>INTAKE</b>

                    <div class="row">
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'IVF 1',
                                'name' => 'first_shift_ivf_one',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'IVF 2',
                                'name' => 'first_shift_ivf_two',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>

                    @include('generate.input', [
                        'label' => 'OTHERS',
                        'name' => 'first_shift_intake_others',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'BLOOD',
                        'name' => 'first_shift_blood',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'TPN',
                        'name' => 'first_shift_tpn',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    <div class="row">
                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'TUBE',
                                'name' => 'first_shift_tube',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>

                        <div class="col-sm-6">
                            @include('generate.input', [
                                'label' => 'ORAL',
                                'name' => 'first_shift_oral',
                                'value' => '',
                                'formGroupClass' => 'mb-3',
                            ])
                        </div>
                    </div>



                    <b>OUTPUT</b>

                    @include('generate.input', [
                        'label' => 'URINE',
                        'name' => 'first_shift_urine',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'DRAIN',
                        'name' => 'first_shift_drain',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'STOOL',
                        'name' => 'first_shift_stool',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'OTHERS',
                        'name' => 'first_shift_output_others',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
