<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#create-faq">
  <i class="fa fa-plus"></i> Create FAQ
</button>
<form method="POST" action="{{ route('faqs.create') }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="create-faq">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Create FAQ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('generate.input', [
            'label' => 'Question',
            'name' => 'question',
            'value' => '',
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.input', [
            'label' => 'Answer',
            'name' => 'answer',
            'value' => '',
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