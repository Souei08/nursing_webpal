<form method="POST" action="{{ route('flow_sheet_form.add-new-flow-sheet') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="add-new-flow-sheet">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New Flow Sheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientFlowSheetForm->id }}">

                    @include('generate.input', [
                        'label' => 'Date',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'IV Bottle No.',
                        'name' => 'iv_bottle_no',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Time Started.',
                        'name' => 'time_started',
                        'type' => 'time',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'IV Fluid',
                        'name' => 'iv_fluid',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Additives',
                        'name' => 'additives',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Rate',
                        'name' => 'rate',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Time Consumed',
                        'name' => 'time_consumed',
                        'type' => 'time',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Remarks',
                        'name' => 'remarks',
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
