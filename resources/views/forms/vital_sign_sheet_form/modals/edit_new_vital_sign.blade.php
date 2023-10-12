<form method="POST" action="{{ route('vital_sign_sheet_form.edit-vital-sign') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-new-vital-sign-{{ $patientVitalSign->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">
                        Edit Vital Sign
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientVitalSign->id }}">

                    @include('generate.input', [
                        'label' => 'Room No.',
                        'name' => 'room_no',
                        'value' => $patientVitalSign->room_no,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Date/Time',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => $patientVitalSign->date_time,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'BP',
                        'name' => 'bp',
                        'value' => $patientVitalSign->bp,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Pulse',
                        'name' => 'pulse',
                        'value' => $patientVitalSign->pulse,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Resp',
                        'name' => 'resp',
                        'value' => $patientVitalSign->resp,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Temp',
                        'name' => 'temp',
                        'value' => $patientVitalSign->temp,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Remarks',
                        'name' => 'remarks',
                        'value' => $patientVitalSign->remarks,
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
