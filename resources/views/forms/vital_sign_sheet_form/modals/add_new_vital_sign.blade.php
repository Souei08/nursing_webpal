<form method="POST" action="{{ route('vital_sign_sheet_form.add-new-vital-sign') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="add-new-vital-sign">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New Vital Sign</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientVitalSignSheetForm->id }}">

                    @include('generate.input', [
                        'label' => 'Room No.',
                        'name' => 'room_no',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Date/Time',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'BP',
                        'name' => 'bp',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Pulse',
                        'name' => 'pulse',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Resp',
                        'name' => 'resp',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Temp',
                        'name' => 'temp',
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
