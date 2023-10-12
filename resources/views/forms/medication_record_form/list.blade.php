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
            @foreach ($list as $medicationRecordForm)
                <tr>
                    <td class="d-none">{{ $medicationRecordForm->id }}</td>
                    <td>{{ $medicationRecordForm->patient_id }}</td>
                    <td>
                        {{ $medicationRecordForm->patient_first_name . ' ' }}
                        {{ $medicationRecordForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $medicationRecordForm->attending_physician_first_name . ' ' }}
                        {{ $medicationRecordForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $medicationRecordForm->created_at->format('M d, Y g:i A') }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('medication_record_form.show', $medicationRecordForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('medication_record_form.edit', $medicationRecordForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $medicationRecordForm->id,
                                'url' => route('medication_record_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
