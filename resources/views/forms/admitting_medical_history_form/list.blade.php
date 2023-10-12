@include('shared.pagination')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center" style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $admittingMedicalHistoryForm)
                <tr>
                    <td class="d-none">{{ $admittingMedicalHistoryForm->id }}</td>
                    <td>
                        {{ $admittingMedicalHistoryForm->patient_first_name . ' ' }}
                        {{ $admittingMedicalHistoryForm->patient_last_name }}
                    </td>
                    <td>{{ $admittingMedicalHistoryForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('admitting_medical_history_form.show', $admittingMedicalHistoryForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('admitting_medical_history_form.edit', $admittingMedicalHistoryForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $admittingMedicalHistoryForm->id,
                                'url' => route('admitting_medical_history_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
