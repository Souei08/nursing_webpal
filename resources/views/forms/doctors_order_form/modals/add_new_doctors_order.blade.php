<form method="POST" action="{{ route('doctors_order_form.add-new-doctors-order') }}" data-ajax="true">
    <div class="modal" tabindex="-1" id="add-new-doctors-order">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Add New Doctors Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="{{ $patientDoctorsOrderForm->id }}">

                    @include('generate.input', [
                        'label' => 'Doctor\'s Order Date',
                        'name' => 'doctors_order_date',
                        'type' => 'datetime-local',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Progress Notes',
                        'name' => 'progress_note',
                        'value' => '',
                        'formGroupClass' => 'mb-3',
                    ])

                    @include('generate.textarea', [
                        'label' => 'Doctor\'s Order',
                        'name' => 'doctors_order',
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
