    $appointment = $data->teacherAppointments()
    ->where(['status' => 'Approved'])
    ->whereDate('start_schedule', $dayOfWeek->toDateString())
    ->whereTime('start_schedule', '>=', $schedule->time_start)
    ->whereTime('end_schedule', '<=', $schedule->time_end)
    ->first();

              <div class="row mb-3 g-1 d-none">
                @for ($i = 1; $i < 8; $i++)
                  @php
                    $dayOfWeek = \Carbon\Carbon::now()->addDays($i);
                    $schedules = $data->teacherAvailability()->get()->filter(function($schedule) use ($dayOfWeek) { return $schedule->day === $dayOfWeek->dayOfWeek; });
                  @endphp
                  <div class="col">
                    <h6 class="text-center">{{ $dayOfWeek->format('l') }}</h6>
                    <p class="text-center small mb-0">{{ $dayOfWeek->format('M d, Y g:i A') }}</p>
                    <hr />
                    @if(count($schedules))
                      @foreach($schedules as $key => $schedule)
                         @php
                            $appointment = $data->teacherAppointments()
                            ->where(['status' => 'Approved'])
                            ->whereDate('start_schedule', $dayOfWeek->toDateString())
                            ->whereTime('start_schedule', '>=', $schedule->time_start)
                            ->whereTime('end_schedule', '<=', $schedule->time_end)
                            ->first();
                         @endphp
                        <div class="border {{ $appointment ? 'bg-secondary' : 'bg-success' }} p-2 rounded mb-1"  style="--bs-bg-opacity: .9;">
                          <div class="form-check">
                            <input {{ $appointment ? 'disabled' : '' }} class="form-check-input schedule" type="radio" name="schedule" id="schedule-{{ $schedule->id }}" value="{{ $schedule->id }}" data-date-start="{{ $dayOfWeek->format('Y-m-d') }} {{ $schedule->time_start }}" data-date-end="{{ $dayOfWeek->format('Y-m-d') }} {{ $schedule->time_end }}">
                            <label class="form-check-label text-white" for="schedule-{{ $schedule->id }}">
                              <div class="small">
                                {{ date("g:i A", strtotime($schedule->time_start)) }} - {{ date("g:i A", strtotime($schedule->time_end)) }}
                                <br />
                                <p class="mb-0 small">{{ $appointment ? 'Not Available' : 'Available' }}</p>
                              </div>
                            </label>
                          </div>
                        </div>
                      @endforeach
                    @else
                      <p class="text-center">Not Available</p>
                    @endif
                  </div>
                @endfor
              </div>