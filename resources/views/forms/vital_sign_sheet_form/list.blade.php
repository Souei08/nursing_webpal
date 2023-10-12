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
            @foreach ($list as $vitalSignSheetForm)
                <tr>
                    <td class="d-none">{{ $vitalSignSheetForm->id }}</td>
                    <td>{{ $vitalSignSheetForm->patient_id }}</td>
                    <td>
                        {{ $vitalSignSheetForm->patient_first_name . ' ' }}
                        {{ $vitalSignSheetForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $vitalSignSheetForm->attending_physician_first_name . ' ' }}
                        {{ $vitalSignSheetForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $vitalSignSheetForm->created_at->format('M d, Y g:i A') }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('vital_sign_sheet_form.show', $vitalSignSheetForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('vital_sign_sheet_form.edit', $vitalSignSheetForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $vitalSignSheetForm->id,
                                'url' => route('vital_sign_sheet_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
