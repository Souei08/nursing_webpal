<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#create-subject-code">
  <i class="fa fa-plus"></i> Create Subject Code
</button>
<form method="POST" action="{{ route('subject-codes.create') }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="create-subject-code">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Create Subject Code</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="mb-2 ">
          <label class="mb-1 ">Subject Code</label>  
          <input 
            name="name" 
            class="form-control" 
            value="" 
            placeholder="Subject Code"
            autocomplete="off"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type="number"
            maxlength="6"
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
                  min="1900"
                >
            </div>
            <div class="col">
              <input 
                class="form-control" 
                placeholder="End Year"
                type="number" 
                id="end_year" 
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
              value="" 
              placeholder="Term"
              autocomplete="off"
              type="text"
            >
        </div>
        <div class="mb-2">
        <label class="mb-1 ">Semester</label>  
          <input 
            min="1" 
            name="semester" 
            class="form-control" 
            value="" 
            placeholder="Semester"
            autocomplete="off"
            type="text"
          >
        </div>
        
          @include('generate.textarea', [
            'label' => 'Description',
            'name' => 'description',
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