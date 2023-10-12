@include('shared.pagination')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Student No.</th>
                <th scope="col">Name</th>
                <th scope="col">Informatics Skill</th>
                <th scope="col">Informatics Knowledge</th>
                <th scope="col">Computer Skills</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $student)
                <tr>
                    <td>{{ $student->studentProfile->student_no }}</td>
                    <td>{{ $student->first_name }} {{ $student->last_name }}</td>
                    
                    <td>
                        <span class="{{ $student->studentProfile->analytic['Informatics Skill'] >= 75 ? '' : 'text-danger' }}">
                            {{ $student->studentProfile->analytic['Informatics Skill'] }}%
                        </span>
                    </td>

                    <td>
                        <span class="{{ $student->studentProfile->analytic['Informatics Knowledge'] >= 75 ? '' : 'text-danger' }}">
                            {{ $student->studentProfile->analytic['Informatics Knowledge'] }}%
                        </span>
                    </td>
                    
                    <td>
                        <span class="{{ $student->studentProfile->analytic['Computer Skills'] >= 75 ? '' : 'text-danger' }}">
                            {{ $student->studentProfile->analytic['Computer Skills'] }}%
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@include('shared.pagination')
