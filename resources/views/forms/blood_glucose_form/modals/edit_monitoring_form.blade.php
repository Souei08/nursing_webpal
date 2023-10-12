<form method="POST" action="{{ route('blood_glucose_form.edit-monitoring-form') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="edit-monitoring-form-{{ $patientMonitoringForm->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Edit Monitoring Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientMonitoringForm->id }}">

                    @include('generate.input', [
                        'label' => 'Date/Time',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => $patientMonitoringForm->date_time,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'HGT',
                        'name' => 'hgt',
                        'value' => $patientMonitoringForm->hgt,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Reffered To',
                        'name' => 'referred_to',
                        'value' => $patientMonitoringForm->referred_to,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Insulin Given',
                        'name' => 'insulin_given',
                        'value' => $patientMonitoringForm->insulin_given,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Administered By',
                        'name' => 'administered_by',
                        'value' => $patientMonitoringForm->administered_by,
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.input', [
                        'label' => 'Remarks',
                        'name' => 'remarks',
                        'value' => $patientMonitoringForm->remarks,
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
