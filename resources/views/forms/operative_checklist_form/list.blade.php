@include('shared.pagination')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Consultant Name</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center" style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $operativeCheckListForm)
                <tr>
                    <td class="d-none">{{ $operativeCheckListForm->id }}</td>
                    <td>
                        {{ $operativeCheckListForm->patient_first_name . ' ' }}
                        {{ $operativeCheckListForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $operativeCheckListForm->consultant_first_name . ' ' }}
                        {{ $operativeCheckListForm->consultant_last_name }}
                    </td>
                    <td>{{ $operativeCheckListForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('operative_checklist_form.show', $operativeCheckListForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('operative_checklist_form.edit', $operativeCheckListForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $operativeCheckListForm->id,
                                'url' => route('operative_checklist_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
