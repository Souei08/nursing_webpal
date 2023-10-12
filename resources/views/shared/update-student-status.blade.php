<button type="button" class="btn btn-success btn-sm ms-2 {{ $class ?? '' }}" style="{{ $style ?? '' }}" data-bs-toggle="modal" data-bs-target="#accept-student-{{ $data->id }}">
  Accept
</button>
<form method="POST" enctype="multipart/form-data" action="{{ route('users.update-student-status', $data->id) }}" data-ajax="true">
  <input type="hidden" name="status" value="Approved">
  <div class="modal fade" id="accept-student-{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="exampleModalLabel">Do you want to <strong class="text-success">&nbsp;accept&nbsp;</strong>{{ $data->first_name }} {{ $data->last_name }}?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Select "Confirm" below if you are continue this action.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</form>

<button type="button" class="btn btn-danger btn-sm ms-2 {{ $class ?? '' }}" style="{{ $style ?? '' }}" data-bs-toggle="modal" data-bs-target="#decline-student-{{ $data->id }}">
  Decline
</button>
<form method="POST" enctype="multipart/form-data" action="{{ route('users.update-student-status', $data->id) }}" data-ajax="true">
  <input type="hidden" name="status" value="Declined">
  <div class="modal fade" id="decline-student-{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title" id="exampleModalLabel">Do you want to <strong class="text-danger">&nbsp;decline&nbsp;</strong> {{ $data->first_name }} {{ $data->last_name }}?</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Select "Confirm" below if you are continue this action.</p>
        </div>
        <div class="modal-footer border-0">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Confirm</button>
        </div>
      </div>
    </div>
  </div>
</form>