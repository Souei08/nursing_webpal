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
            @foreach ($list as $referralForm)
                <tr>
                    <td class="d-none">{{ $referralForm->id }}</td>
                    <td>
                        {{ $referralForm->patient_first_name . ' ' }}
                        {{ $referralForm->patient_last_name }}
                    </td>
                    <td>
                        {{ $referralForm->consultant_first_name . ' ' }}
                        {{ $referralForm->consultant_last_name }}
                    </td>
                    <td>{{ $referralForm->created_at->format('M d, Y g:i A') }}</td>
                    <td class="">
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-sm btn-primary"
                                href="{{ route('referral_form.show', $referralForm->id) }}">
                                <i class="fa fa-eye"></i>
                            </a>

                            <a class="btn btn-sm btn-success ms-2"
                                href="{{ route('referral_form.edit', $referralForm->id) }}">
                                <i class="fa fa-pencil"></i>
                            </a>

                            @include('shared.delete-item', [
                                'class' => '',
                                'type' => 'Forms',
                                'id' => $referralForm->id,
                                'url' => route('referral_form.delete'),
                            ])
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
