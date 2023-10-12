<form method="POST" action="{{ route('medication_record_form.edit-single-order-stat') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-single-order-stat-{{ $patientMedicationRecordFormSingleOrderStat->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit Single Order/Stat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientMedicationRecordFormSingleOrderStat->id }}">

                    @include('generate.input', [
                        'label' => 'Date Order',
                        'name' => 'date_ordered',
                        'type' => 'datetime-local',
                        'value' => $patientMedicationRecordFormSingleOrderStat->date_ordered,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Medication',
                        'name' => 'medication',
                        'value' => $patientMedicationRecordFormSingleOrderStat->medication,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Date/Time Given',
                        'name' => 'date_time_given',
                        'type' => 'datetime-local',
                        'value' => $patientMedicationRecordFormSingleOrderStat->date_time_given,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Initials',
                        'name' => 'initials',
                        'value' => $patientMedicationRecordFormSingleOrderStat->initials,
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
