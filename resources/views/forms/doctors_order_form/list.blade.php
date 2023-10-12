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
            @foreach ($list as $doctorsOrderForm)
                <tr>
                    <td class="d-none">{{ $doctorsOrderForm->id }}</td>
                    <td>{{ $doctorsOrderForm->patient_id }}</td>
                    <td>
                        {{ $doctorsOrderForm->first_name . ' ' }}
                        {{ $doctorsOrderForm->last_name }}
                    </td>
                    <td>
                        {{ $doctorsOrderForm->attending_physician_first_name . ' ' }}
                        {{ $doctorsOrderForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $doctorsOrderForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('doctors_order_form.show', $doctorsOrderForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('doctors_order_form.edit', $doctorsOrderForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $doctorsOrderForm->id,
                                'url' => route('doctors_order_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
