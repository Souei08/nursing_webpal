@include('shared.pagination')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Attending Physician Name</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center" style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $patientAdmissionRecordForm)
                <tr>
                    <td class="d-none">{{ $patientAdmissionRecordForm->id }}</td>
                    <td>
                        {{ $patientAdmissionRecordForm->patient_first_name . ' ' }}
                        {{ $patientAdmissionRecordForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $patientAdmissionRecordForm->attending_physician_first_name . ' ' }}
                        {{ $patientAdmissionRecordForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $patientAdmissionRecordForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('patient_admission_record_form.show', $patientAdmissionRecordForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('patient_admission_record_form.edit', $patientAdmissionRecordForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $patientAdmissionRecordForm->id,
                                'url' => route('patient_admission_record_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
