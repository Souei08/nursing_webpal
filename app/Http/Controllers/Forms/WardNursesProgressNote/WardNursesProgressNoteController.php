<?php

namespace App\Http\Controllers\Forms\WardNursesProgressNote;

use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\WardNursesProgressNote\AddNewPatientRequest;
use App\Http\Requests\Forms\WardNursesProgressNote\EditPatientInformationRequest;
use App\Models\CardiovascularSystem;
use App\Models\DoctorsVisit;
use App\Models\GastrointestinalSystem;
use App\Models\GenitourinarySystem;
use App\Models\Handover;
use App\Models\IntegumentarySystem;
use App\Models\IntravenousFluid;
use App\Models\LevelOfConsciousness;
use App\Models\MusculosketalSystem;
use App\Models\NursingDocumentation;
use App\Models\PainAssessment;
use App\Models\RespiratorySystem;
use App\Models\StudentProfile;
use App\Models\SubjectCode;
use App\Models\WardNursesProgressNote;
use Illuminate\Http\Request;

class WardNursesProgressNoteController extends Controller
{
    public function index(Request $request)
    {
        $data = WardNursesProgressNote::orderBy('id', 'DESC')->groupBy('patient_id');

        // $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->get();
        $subjectCodes = SubjectCode::where(['user_id' => auth()->user()->id])->pluck('id')->toArray();

        if (auth()->user()->role->slug === 'teacher') {

            $students = StudentProfile::whereIn('subject_code_id', $subjectCodes)->get()->pluck('user_id');
            $students[count($students) + 1] = auth()->user()->id;
            $data->whereIn('user_id', $students);
        } elseif (auth()->user()->role->slug === 'student') {
            $data->where(['user_id' => auth()->user()->id]);
        }

        if ($request->ajax() || ($request->has('search') && $request->search !== '')) {
            $data->where('patient_first_name', 'like', '%' . $request->search . '%');

            return view('forms.ward_nurses_progress_note.list', [
                'list' => $data->orderBy('id', 'DESC')->paginate($request->per_page ?? 10),
            ])->render();
        }

        return view('forms.ward_nurses_progress_note.index', [
            'list' => $data->paginate($request->per_page ?? 10),
        ]);
    }

    public function create()
    {
        return view('forms.ward_nurses_progress_note.create');
    }

    public function store(AddNewPatientRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        WardNursesProgressNote::create($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'redirect_url' => route('ward_nurses_progress_notes.index'),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function show($id)
    {
        $wardNurseProgressNote = WardNursesProgressNote::findOrFail($id);

        return view('forms.ward_nurses_progress_note.show', compact(['wardNurseProgressNote']));
    }

    public function edit($id)
    {
        $patientWardNurseProgressNote = WardNursesProgressNote::findOrFail($id);

        return view('forms.ward_nurses_progress_note.edit', compact('patientWardNurseProgressNote'));
    }

    public function update($id, EditPatientInformationRequest $request)
    {
        $data = $request->all();
        WardNursesProgressNote::find($id)->update($data);

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Updated Successfully.',
            'success' => true,
        ], 200);
    }

    public function destroy(Request $request)
    {
        $data = WardNursesProgressNote::find($request->id);

        if ($data && $data->delete()) {
            return response()->json([
                'redirect_url' => redirect()->back()->getTargetUrl(),
                'message' => 'Successfully Deleted',
                'success' => true,
            ], 200);
        }

        return response()->json([
            'redirect_url' => redirect()->back()->getTargetUrl(),
            'message' => 'Theres an error deleting this item.',
            'success' => true,
        ], 200);
    }

    public function addNewProgressNotes(Request $request)
    {
        if ($request->progress_notes == 'Level of Consciousness') {
            return view('forms.ward_nurses_progress_note.progress_notes.level_of_consciousness');
        } else if ($request->progress_notes == 'Respiratory System') {
            return view('forms.ward_nurses_progress_note.progress_notes.respiratory_system');
        } else if ($request->progress_notes == 'Cardiovascular System') {
            return view('forms.ward_nurses_progress_note.progress_notes.cardiovascular_system');
        } else if ($request->progress_notes == 'Gastrointestinal System') {
            return view('forms.ward_nurses_progress_note.progress_notes.gastrointestinal_system');
        } else if ($request->progress_notes == 'Genitourinary System') {
            return view('forms.ward_nurses_progress_note.progress_notes.genitourinary_system');
        } else if ($request->progress_notes == 'Musculosketal System') {
            return view('forms.ward_nurses_progress_note.progress_notes.musculosketal_system');
        } else if ($request->progress_notes == 'Integumentary System') {
            return view('forms.ward_nurses_progress_note.progress_notes.integumentary_system');
        } else if ($request->progress_notes == 'Pain Assessment') {
            return view('forms.ward_nurses_progress_note.progress_notes.pain_assessment');
        } else if ($request->progress_notes == 'Intravenous Fluid') {
            return view('forms.ward_nurses_progress_note.progress_notes.intravenous_fluid');
        } else if ($request->progress_notes == 'Doctors Visit') {
            return view('forms.ward_nurses_progress_note.progress_notes.doctors_visit');
        } else if ($request->progress_notes == 'Nursing Documentation') {
            return view('forms.ward_nurses_progress_note.progress_notes.nursing_documentation');
        } else if ($request->progress_notes == 'Handover Notes') {
            return view('forms.ward_nurses_progress_note.progress_notes.handover_notes');
        }
    }




    public function addLevelOfConsciousness(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        LevelOfConsciousness::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addRespiratorySystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        RespiratorySystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addCardiovascularSystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        CardiovascularSystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addGastrointestinalSystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        GastrointestinalSystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addGenitourinarySystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        GenitourinarySystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addMusculosketalSystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        MusculosketalSystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addIntegumentarySystem(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        IntegumentarySystem::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addPainAssessment(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        PainAssessment::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }



    public function addIntravenousFluid(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        IntravenousFluid::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addDoctorsVisit(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        DoctorsVisit::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addNursingDocumentation(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        NursingDocumentation::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }

    public function addHandoverNotes(Request $request)
    {
        $data = $request->except('_token');

        $data['user_id'] = auth()->user()->id;
        Handover::create($data);

        return response()->json([
            'redirect_url' => route('ward_nurses_progress_notes.show', request('ward_nurses_progress_note_id')),
            'message' => 'Created Successfully.',
            'success' => true,
        ], 200);
    }


}
