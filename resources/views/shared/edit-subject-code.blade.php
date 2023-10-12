<button class="btn btn-sm btn-success ms-2" type="button" data-bs-toggle="modal" data-bs-target="#update-item-{{ $data->id }}">
  <i class="fa-solid fa-pencil"></i>
</button>
<form method="POST" action="{{ route('subject-codes.update', $data->id) }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="update-item-{{ $data->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Update Subject Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-2 ">
            <label class="mb-1 ">Subject Code</label>  
            <input 
              name="name" 
              class="form-control" 
              placeholder="Subject Code"
              autocomplete="off"
              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
              type="number"
              maxlength="6"
              value="{{ $data->name }}" 
            >
          </div>
          <div class="mb-2">
          <label class="mb-1 text-center">School Year:</label>  

            <div class="row">
              <div class="col">
                  <input 
                    class="form-control" 
                    placeholder="Start Year"
                    type="number" 
                    id="start_year" 
                    name="start_year" 
                    value="{{ $data->start_year }}" 
                    min="1900"
                  >
              </div>
              <div class="col">
                <input 
                  class="form-control" 
                  placeholder="End Year"
                  type="number" 
                  id="end_year" 
                  value="{{ $data->end_year }}" 
                  name="end_year" 
                  min="1900" 
                  >
              </div>
            </div>
          </div>
          <div class="mb-2">
          <label class="mb-1 ">Term</label>  
            <input 
                min="1" 
                name="term" 
                class="form-control" 
                placeholder="Term"
                autocomplete="off"
                value="{{ $data->term }}" 
                type="text"
              >
          </div>
          <div class="mb-2">
          <label class="mb-1 ">Semester</label>  
            <input 
              min="1" 
              name="semester" 
              class="form-control" 
              placeholder="Semester"
              value="{{ $data->semester }}" 
              autocomplete="off"
              type="text"
            >
          </div>
          @include('generate.textarea', [
            'label' => 'Description',
            'name' => 'description',
            'value' => $data->description,
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