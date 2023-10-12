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
            @foreach ($list as $flowSheetForm)
                <tr>
                    <td class="d-none">{{ $flowSheetForm->id }}</td>
                    <td>{{ $flowSheetForm->patient_id }}</td>
                    <td>
                        {{ $flowSheetForm->patient_first_name . ' ' }}
                        {{ $flowSheetForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $flowSheetForm->attending_physician_first_name . ' ' }}
                        {{ $flowSheetForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $flowSheetForm->created_at->format('M d, Y g:i A') }}</td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('flow_sheet_form.show', $flowSheetForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('flow_sheet_form.edit', $flowSheetForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $flowSheetForm->id,
                                'url' => route('flow_sheet_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
