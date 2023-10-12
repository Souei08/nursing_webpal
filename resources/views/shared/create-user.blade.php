<button class="btn btn-danger text-capitalize" type="button" data-bs-toggle="modal" data-bs-target="#create-faq">
  <i class="fa fa-plus"></i> Create {{ substr($type, 0, -1) }}
</button>
<form method="POST" action="{{ route('users.create') }}" data-ajax="true" enctype="multipart/form-data">
  <div class="modal" tabindex="-1" id="create-faq">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title text-capitalize">Create {{ substr($type, 0, -1) }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @php
            $roleId = [
                'admins' => 1,
                'teachers' => 2,
                'students' => 3,
            ];
          @endphp
          <input type="hidden" name="role_id" value="{{ $roleId[$type] }}">
          <h5 class="mb-4">Profile Details</h5>
          <div class="row">
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'First Name',
                'name' => 'first_name',
                'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Middle Name',
                'name' => 'middle_name',
                 'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Last Name',
                'name' => 'last_name',
                'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              @include('generate.input', [
                'label' => 'Contact No.',
                'name' => 'contact_no',
                'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
            <div class="col-md-4">
              @include('generate.select', [
                'label' => 'Gender',
                'name' => 'gender',
                'value' => '',
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
                'value' => '',
                'formGroupClass' => 'mb-3'
              ])
            </div>
          </div>
          @include('generate.select', [
            'label' => 'Status',
            'name' => 'status',
            'value' => 'Active',
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
            'value' => '',
            'formGroupClass' => 'mb-3'
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
