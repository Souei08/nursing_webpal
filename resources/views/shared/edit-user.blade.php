<button class="btn btn-sm btn-success ms-2" type="button" data-bs-toggle="modal" data-bs-target="#update-item-{{ $data->id }}">
  <i class="fa-solid fa-pencil"></i>
</button>
<form method="POST" action="{{ route('users.update', $data->id) }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="update-item-{{ $data->id }}">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-capitalize">Update {{ substr($type, 0, -1) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="role_id" value="{{ $data->role_id }}">
          <h5 class="mb-4">Profile Details</h5>
          <div class="row">
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'First Name',
                'name' => 'first_name',
                'value' => $data->first_name,
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Middle Name',
                'name' => 'middle_name',
                'value' => $data->middle_name,
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Last Name',
                'name' => 'last_name',
                'value' => $data->last_name,
                'formGroupClass' => 'mb-3'
              ])
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Contact No.',
                'name' => 'contact_no',
                'value' => $data->contact_no,
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.select', [
                'label' => 'Gender',
                'name' => 'gender',
                'value' => $data->gender,
                'options' => [
                  [
                    'name' => 'Male',
                    'value' => 'Male',
                  ],
                  [
                    'name' => 'Female',
                    'value' => 'Female',
                  ]
                ],
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Date of Birth',
                'type' => 'date',
                'name' => 'date_of_birth',
                'value' => $data->date_of_birth,
                'formGroupClass' => 'mb-3'
              ])
            </div>
          </div>
          @include('generate.select', [
            'label' => 'Status',
            'name' => 'status',
            'value' => $data->status,
            'options' => [
              [
                'name' => 'Pending',
                'value' => 'Pending',
              ],
              [
                'name' => 'Active',
                'value' => 'Active',
              ],
              [
                'name' => 'Suspend',
                'value' => 'Suspended',
              ],
            ],
            'formGroupClass' => 'mb-3'
          ])
          <hr class="mt-4" />
          <h5 class="mb-4">Account Details</h5>
          @include('generate.input', [
            'type' => 'email',
            'label' => 'Email Address',
            'name' => 'email',
            'value' => $data->email,
            'formGroupClass' => '',
            'readonly' => 'readonly'
          ])
          @include('generate.input', [
            'type' => 'password',
            'label' => 'Password',
            'name' => 'password',
            'value' => '',
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.input', [
            'type' => 'password',
            'label' => 'Confirm Password',
            'name' => 'password_confirmation',
            'value' => '',
            'formGroupClass' => 'mb-3'
          ])
        </div>
        <div class="modal-footer pt-0 border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>