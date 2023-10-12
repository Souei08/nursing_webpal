@include('shared.pagination')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Attending Physician Name</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center" style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $wardNursesProgressNote)
                <tr>
                    <td class="d-none">{{ $wardNursesProgressNote->id }}</td>
                    <td>{{ $wardNursesProgressNote->patient_id }}</td>
                    <td>
                        {{ $wardNursesProgressNote->patient_first_name . ' ' }}
                        {{ $wardNursesProgressNote->patient_last_name }}
                    </td>
                    <td>
                        {{ $wardNursesProgressNote->attending_physician_first_name . ' ' }}
                        {{ $wardNursesProgressNote->attending_physician_last_name }}
                    </td>
                    <td>{{ $wardNursesProgressNote->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('ward_nurses_progress_notes.show', $wardNursesProgressNote->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('ward_nurses_progress_notes.edit', $wardNursesProgressNote->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $wardNursesProgressNote->id,
                                'url' => route('ward_nurses_progress_notes.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
