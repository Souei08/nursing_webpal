@include('shared.pagination')
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" class="d-none">#</th>
        <th scope="col">Title</th>
        <th scope="col">Last Update</th>
        <th scope="col" style="width: 100px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($list as $data)
      <tr>
        <td class="d-none">{{ $data->id }}</td>
        <td>{{ $data->title }}</td>
        <td>{{ $data->updated_at->format('M d, Y g:i A') }}</td>
        <td class="">
          <div class="d-flex justify-content-center">
            <a class="btn btn-sm btn-primary" href="{{ route('forms.edit', $data->id) }}">
              <i class="fa fa-eye"></i>
            </a> 
            @include('shared.delete-item', ['class' => '', 'type' => 'Forms', 'id' => $data->id, 'url' => route('forms.delete')])
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('shared.pagination')