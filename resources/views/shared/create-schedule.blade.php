<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#create-teacher-availability">
  <i class="fa fa-plus"></i> Add Availability
</button>
<form method="POST" action="{{ route('teacher-availability.create') }}" data-ajax="true">
  <div class="modal" tabindex="-1" id="create-teacher-availability">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <h5 class="modal-title">Add Availability</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          @include('generate.select', [
            'label' => 'Day',
            'name' => 'day',
            'value' => '',
            'options' => collect(\Carbon\Carbon::getDays())->map(function($day, $index) {
                return [
                  'name' => $day,
                  'value' => $index,
                ];
            }),
            'formGroupClass' => 'mb-3'
          ])
          @php
            $time = [];
            for($hours=0; $hours<24; $hours++) // the interval for hours is '1'
                for($mins=0; $mins<60; $mins+=60) // the interval for mins is '30'
                    $time[] = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
          @endphp
          @include('generate.select', [
            'label' => 'Select Time',
            'name' => 'time',
            'value' => '',
            'options' => collect($time)->map(function($time) {
                return [
                  'name' => date("g:i A", strtotime($time)).' - '.date("g:i A", strtotime($time) + 60 * 60),
                  'value' => $time.' - '.date("H:i", strtotime($time) + 60 * 60),
                ];
            }),
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