@include('shared.pagination')
<div class="table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" class="d-none">#</th>
        <th scope="col">Question</th>
        <th scope="col">Answer</th>
        <th scope="col" style="width: 100px;">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($list as $data)
      <tr>
        <td class="d-none">{{ $data->id }}</td>
        <td>{{ $data->question }}</td>
        <td>{{ $data->answer }}</td>
        <td class="">
          @include('shared.edit-faq')
          @include('shared.delete-item', ['class' => '', 'type' => 'FAQ', 'id' => $data->id, 'url' => route('faqs.delete')])
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@include('shared.pagination')