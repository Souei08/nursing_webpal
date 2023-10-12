@include('shared.pagination')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="d-none">User #</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                @if (auth()->user()->is_super && $type === 'admins')
                    <th scope="col">Is Super Admin</th>
                @endif
                @if ($type === 'students')
                    <th scope="col">Subject Code</th>
                @endif
                @if ($type === 'teachers')
                    <th scope="col">Department/Program</th>
                @endif
                <th scope="col">Email</th>
                <th scope="col">Deleted At</th>
                <th scope="col">Status</th>
                @if (auth()->user()->is_super || auth()->user()->role->slug === 'teacher')
                    <th scope="col" class="text-center">Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $data)
                <tr>
                    <td class="d-none">{{ $data->id }}</td>
                    <td>
                        <a href="{{ $data->photo }}" data-lightbox="image-{{ $data->id }}"
                            class="text-dark text-decoration-none">
                            <img src="{{ $data->photo }}" style="width: 50px;">
                        </a>
                    </td>
                    <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                    @if (auth()->user()->is_super && $type === 'admins')
                        <td>{{ $data->is_super ? 'Yes' : 'No' }}</td>
                    @endif
                    @if ($type === 'students')
                        <td>{{ $data->studentProfile->subjectCode->name }}</td>
                    @endif
                    @if ($type === 'teachers')
                        <td>{{ $data->teacherProfile->department }}</td>
                    @endif

                    <td>{{ $data->email ?? 'N/A' }}</td>
                    <td>{{ $data->deleted_at ?? 'N/A' }}</td>
                    @if ($type === 'students')
                        <td>{{ $data->deleted_at ? 'Deleted' : $data->studentProfile->status }}</td>
                    @else
                        <td>{{ $data->deleted_at ? 'Deleted' : $data->status }}</td>
                    @endif
                    @if (auth()->user()->is_super)
                        <td>
                            <div class="d-flex justify-content-center">
                                @if ($data->deleted_at)
                                    @include('shared.restore-item', [
                                        'class' => '',
                                        'type' => $type,
                                        'id' => $data->id,
                                        'url' => route('users.restore'),
                                    ])
                                    @include('shared.force-delete-item', [
                                        'class' => '',
                                        'type' => $type,
                                        'id' => $data->id,
                                        'url' => route('users.delete', ['force_delete' => 'true']),
                                    ])
                                @else
                                    @include('shared.edit-user', ['type' => $type])
                                    @include('shared.delete-item', [
                                        'class' => '',
                                        'type' => $type,
                                        'id' => $data->id,
                                        'url' => route('users.delete'),
                                    ])
                                @endif
                            </div>
                        </td>
                    @endif
                    @if (auth()->user()->role->slug === 'teacher')
                        <td>
                            <div class="d-flex justify-content-center">
                                @if ($data->studentProfile->status === 'Pending')
                                    @include('shared.update-student-status')
                                @elseif($data->studentProfile->status === 'Declined')
                                    @include('shared.restore-delete-student-status')
                                @endif
                            </div>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
