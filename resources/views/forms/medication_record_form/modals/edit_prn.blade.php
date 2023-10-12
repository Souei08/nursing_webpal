<form method="POST" action="{{ route('medication_record_form.edit-prn') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-prn-{{ $patientMedicationRecordFormPRN->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit PRN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientMedicationRecordFormPRN->id }}">

                    @include('generate.input', [
                        'label' => 'Date Order',
                        'name' => 'prn_date_ordered',
                        'type' => 'datetime-local',
                        'value' => $patientMedicationRecordFormPRN->prn_date_ordered,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Medication',
                        'name' => 'prn_medication',
                        'value' => $patientMedicationRecordFormPRN->prn_medication,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Date/Time',
                        'name' => 'prn_date_time',
                        'type' => 'datetime-local',
                        'value' => $patientMedicationRecordFormPRN->prn_date_time,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Remarks',
                        'name' => 'prn_remarks',
                        'value' => $patientMedicationRecordFormPRN->prn_remarks,
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
