

<form action="{{ route('dashboard.index') }}" method="GET">
        <div class="mb-2 card w-100">
          <div class="card-body">
            <div class="row align-items-end">
             <div class="col-lg-2 col-sm-12 col-md-4 mb-1">
                    <label class="mb-1 fs-6">Subject Codes</label>  
                    <input 
                      class="form-control" 
                      placeholder="Subject Codes"
                      name="name" 
                      min="1900"
                      maxlength="6"
                      value="{{ isset($search['name']) ? $search['name'] : '' }}"
                    >
                </div>
                <div class="col-lg-2 col-sm-12 col-md-4 mb-1">
                    <label class="mb-1 fs-6">School Year</label>  
                    <input 
                      class="form-control" 
                      placeholder="Start Year"
                      type="number" 
                      name="start_year" 
                      min="1900"
                      value="{{ isset($search['start_year']) ? $search['start_year'] : '' }}"
                    >
                </div>
                <div class="col-lg-2 col-sm-12 col-md-4 mb-1">
                  <label class="mb-1 invisible">School Year:</label>  
                  <input 
                    class="form-control" 
                    placeholder="End Year"
                    type="number" 
                    name="end_year" 
                    min="1900" 
                    value="{{ isset($search['end_year']) ? $search['end_year'] : '' }}"
                    >
                </div>

                <div class="col-lg-2 col-sm-12 col-md-4 mb-1">
                      <label class="mb-1 fs-6">Semester</label>  
                      <input 
                        min="1" 
                        name="semester" 
                        class="form-control" 
                        placeholder="Semester"
                        autocomplete="off"
                        type="text"
                        value="{{ isset($search['semester']) ? $search['semester'] : '' }}"
                      >
                </div>
                  <div class="col-lg-2 col-sm-12 col-md-4 mb-1">
                      <label class="mb-1 fs-6">Term</label>  
                      <input 
                        min="1" 
                        name="term" 
                        class="form-control" 
                        placeholder="Term"
                        autocomplete="off"
                        type="text"
                        value="{{ isset($search['term']) ? $search['term'] : '' }}"
                        > 
                  </div>
                  <div class="col d-flex flex-row justify-content-start flex-wrap align-items-end gap-2">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Reset</a>
                  </div>
              </div>
            </div>
        </div>
</form>