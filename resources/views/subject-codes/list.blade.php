@include('shared.pagination')
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" class="d-none">#</th>
        @if(auth()->user()->role->slug === 'admin')
          <th scope="col">Teacher</th>
        @endif
        <th scope="col">Subject Code</th>
        <th scope="col">School Year</th>
        <th scope="col">Semester</th>
        <th scope="col">Term</th>
        <th scope="col">Description</th>
        <th scope="col">Students</th>
        <th scope="col">Tasks</th>
        <th scope="col" style="width: 100px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($list as $data)
      <tr>
        <td class="d-none">{{ $data->id }}</td>
        @if(auth()->user()->role->slug === 'admin')
          <td>{{ $data->user->first_name }} {{ $data->user->last_name }}</td>
        @endif
        <td>{{ $data->name }}</td>
        <td>{{ $data->start_year }} - {{ $data->end_year }}</td>
        <td>{{ $data->semester }}</td>
        <td>{{ $data->term }}</td>
        <td>{{ $data->description }}</td>
        <td>{{ $data->students()->count() }}</td>
        <td>{{ $data->tasks()->count() }}</td>
        <td class="">
          <div class="d-flex justify-content-center">
            <a class="btn btn-sm btn-primary" href="{{ route('subject-codes.show', ['id' => $data->id, 'tab' => 'students']) }}">
              <i class="fa fa-eye"></i>
            </a> 
            @include('shared.edit-subject-code')
            @include('shared.delete-item', ['class' => '', 'type' => 'SubjectCode', 'id' => $data->id, 'url' => route('subject-codes.delete')])
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('shared.pagination')