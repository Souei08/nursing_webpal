<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#create-announcement">
  <i class="fa fa-plus"></i> Create Announcement
</button>
<form method="POST" action="{{ route('announcements.create') }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="create-announcement">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Create Announcement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('generate.select', [
            'label' => 'Subject Code',
            'name' => 'subject_code_id',
            'value' => '',
            'options' => $subject_codes->map(function($subjectCode) {
                return [
                  'name' => $subjectCode->name,
                  'value' => $subjectCode->id,
                ];
            }),
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.select', [
            'label' => 'Category',
            'name' => 'category',
            'value' => '',
            'options' => [
              [
                'name' => 'News',
                'value' => 'News',
              ],
              [
                'name' => 'Advisory',
                'value' => 'Advisory',
              ],
            ],
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.input', [
            'label' => 'Title',
            'name' => 'title',
            'value' => '',
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.textarea', [
            'label' => 'Body',
            'name' => 'body',
            'value' => '',
            'inputClass' => 'd',
            'labelClass' => 'mb-0',
            'rows' => 6,
          ])
          @include('generate.select', [
            'label' => 'Status',
            'name' => 'status',
            'value' => 'Published',
            'options' => [
              [
                'name' => 'Publish',
                'value' => 'Published',
              ],
              [
                'name' => 'Unpublish',
                'value' => 'Unpublished',
              ],
            ],
            'formGroupClass' => 'mb-3'
          ])
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>