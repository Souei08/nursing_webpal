<form method="POST" action="{{ route('flow_sheet_form.edit-flow-sheet') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-flow-sheet-{{ $patientFlowSheet->id }}">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit Flow Sheet</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientFlowSheet->id }}">

                    @include('generate.input', [
                        'label' => 'Date',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => $patientFlowSheet->date_time,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'IV Bottle No.',
                        'name' => 'iv_bottle_no',
                        'value' => $patientFlowSheet->iv_bottle_no,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Time Started.',
                        'name' => 'time_started',
                        'type' => 'time',
                        'value' => $patientFlowSheet->time_started,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'IV Fluid',
                        'name' => 'iv_fluid',
                        'value' => $patientFlowSheet->iv_fluid,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Additives',
                        'name' => 'additives',
                        'value' => $patientFlowSheet->additives,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Rate',
                        'name' => 'rate',
                        'value' => $patientFlowSheet->rate,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Time Consumed',
                        'name' => 'time_consumed',
                        'type' => 'time',
                        'value' => $patientFlowSheet->time_consumed,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Remarks',
                        'name' => 'remarks',
                        'value' => $patientFlowSheet->remarks,
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
