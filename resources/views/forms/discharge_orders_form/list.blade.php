@include('shared.pagination')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="d-none">#</th>
                <th scope="col">Patient Name</th>
                <th scope="col">Attending Physician</th>
                <th scope="col">Date Created</th>
                <th scope="col" class="text-center" style="width: 100px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $dischargeOrdersForm)
                <tr>
                    <td class="d-none">{{ $dischargeOrdersForm->id }}</td>
                    <td>
                        {{ $dischargeOrdersForm->patient_first_name . ' ' }}
                        {{ $dischargeOrdersForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $dischargeOrdersForm->attending_physician_first_name . ' ' }}
                        {{ $dischargeOrdersForm->attending_physician_last_name }}
                    </td>
                    <td>{{ $dischargeOrdersForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('discharge_orders_form.show', $dischargeOrdersForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('discharge_orders_form.edit', $dischargeOrdersForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $dischargeOrdersForm->id,
                                'url' => route('discharge_orders_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
