<form method="POST" action="{{ route('blood_glucose_form.add-new-monitoring-form') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="add-new-monitoring-form">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New Monitoring Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientBloodGlucoseForm->id }}">

                    @include('generate.input', [
                        'label' => 'Date/Time',
                        'name' => 'date_time',
                        'type' => 'datetime-local',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'HGT',
                        'name' => 'hgt',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Referred To',
                        'name' => 'referred_to',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Insulin Given',
                        'name' => 'insulin_given',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Administered By',
                        'name' => 'administered_by',
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
