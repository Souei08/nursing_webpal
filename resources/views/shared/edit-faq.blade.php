<button class="btn btn-sm btn-success mb-2 w-100" type="button" data-bs-toggle="modal" data-bs-target="#update-item-{{ $data->id }}">
  <i class="fa-solid fa-pencil"></i> Edit
</button>
<form method="POST" action="{{ route('faqs.update', $data->id) }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="update-item-{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Update FAQ</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('generate.input', [
            'label' => 'Question',
            'name' => 'question',
            'value' => $data->question,
            'formGroupClass' => 'mb-3'
          ])
          @include('generate.input', [
            'label' => 'Answer',
            'name' => 'answer',
            'value' => $data->answer,
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