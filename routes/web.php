<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\{
    LandingController,
    LoginController,
    RegisterController,
    UserController,
    DashboardController,
    ProfileController,
    SocketController,
    InboxController,
    SubjectCodeController,
    TaskController,
    TaskSubmissionController,
    FormController,
    AnnouncementController,
    FaqController,
    TeacherAvailabilityController,
};
use App\Http\Controllers\Forms\AdmittingMedicalHistoryForm\AdmittingMedicalHistoryFormController;
use App\Http\Controllers\Forms\BloodGlucoseForm\BloodGlucoseFormController;
use App\Http\Controllers\Forms\DischargeOrdersForm\DischargeOrdersFormController;
use App\Http\Controllers\Forms\DoctorsOrderForm\DoctorsOrderFormController;
use App\Http\Controllers\Forms\InformedConsentAdmissionForm\InformedConsentAdmissionFormController;
use App\Http\Controllers\Forms\InformedConsentSurgeryForm\InformedConsentSurgeryFormController;
use App\Http\Controllers\Forms\ReferralForm\ReferralFormController;
use App\Http\Controllers\Forms\DischargeClinicalSummary\DischargeClinicalSummaryFormController;
use App\Http\Controllers\Forms\FlowSheetForm\FlowSheetFormController;
use App\Http\Controllers\Forms\FluidBalanceSheetForm\FluidBalanceSheetFormController;
use App\Http\Controllers\Forms\InformedConsentTreatmentForm\InformedConsentTreatmentFormController;
use App\Http\Controllers\Forms\MedicationRecordForm\MedicationRecordFormController;
use App\Http\Controllers\Forms\NursesNotes\NursesNotesController;
use App\Http\Controllers\Forms\NursesNotes\NursesNotesFormController;
use App\Http\Controllers\Forms\OperativeChecklistForm\OperativeChecklistFormController;
use App\Http\Controllers\Forms\OperativeClearanceForm\OperativeClearanceFormController;
use App\Http\Controllers\Forms\PatientAdmissionRecordForm\PatientAdmissionRecordFormController;
use App\Http\Controllers\Forms\VitalSignSheetForm\VitalSignSheetFormController;
use App\Http\Controllers\Forms\WardNursesProgressNote\WardNursesProgressNoteController;

Route::post('logout', [LoginController::class, 'logOut'])->name('logout');

Route::middleware(['guest'])->group(function () {
    // Public
    Route::get('/', [LandingController::class, 'index'])->name('index');
    Route::get('/terms-of-use', [LandingController::class, 'termsOfUse'])->name('terms-of-use');

    Route::get('/frequently-asked-questions', [LandingController::class, 'faq'])->name('frequently-asked-questions');

    // Login
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'logIn'])->name('post.login');
    // Register
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('post.register');

    Route::get('verification/{token}', [RegisterController::class, 'verification'])->name('verification');
    Route::post('verify', [RegisterController::class, 'verify'])->name('verification.post');
    Route::post('verify/resend', [RegisterController::class, 'resendVerificationCode'])->name('verification.resend');

    // Email Verification
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect(route('index'))->withSuccess('Email successfully verified.');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    // Forgot Password
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->middleware('guest')->name('password.request');
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return response()->json([
            'redirect_url' => redirect(route('login'))->getTargetUrl(),
            'message' => $status === Password::RESET_LINK_SENT ? 'We have e-mailed your password reset link!' : 'Error sending password reset link.',
            'success' => true,
        ], 200);
    })->middleware('guest')->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->middleware('guest')->name('password.reset');

    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return response()->json([
            'redirect_url' => redirect(route('login'))->getTargetUrl(),
            'message' => $status === Password::PASSWORD_RESET ? 'You\'ve successfully changed your password!' : 'Error changing your password',
            'success' => true,
        ], 200);
    })->middleware('guest')->name('password.update');
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([])->group(function () {
        // Route::post('broadcasting/auth', [SocketController::class, 'broadcastingPrivateAuth']);
        Route::post('broadcasting/auth', [SocketController::class, 'broadcastingPresenceAuth']);

        Route::get('instructor', [ProfileController::class, 'instructor'])->name('instructor');

        Route::prefix('profile')->name('profile.')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('index');
            Route::get('/u/{id}', [ProfileController::class, 'profile'])->name('profile');
            Route::get('change-password', [ProfileController::class, 'changePassword'])->name('change-password');
            Route::prefix('update')->name('update.')->group(function () {
                Route::post('/', [ProfileController::class, 'update'])->name('user');
                Route::post('profile-photo', [ProfileController::class, 'updateProfilePhoto'])->name('profile-photo');
                Route::post('password', [ProfileController::class, 'updatePassword'])->name('password');
            });
        });

        Route::prefix('inbox')->name('inbox.')->group(function () {
            Route::get('/', [InboxController::class, 'index'])->name('index');
            Route::post('/create', [InboxController::class, 'create'])->name('create');
            Route::post('/udpate/{id}', [InboxController::class, 'update'])->name('update');
            Route::get('/show/{conversation_id}', [InboxController::class, 'show'])->name('show');
            Route::post('/send/{conversation_id}', [InboxController::class, 'send'])->name('send');
            Route::get('/leave/{conversation_id}', [InboxController::class, 'leave'])->name('leave');
            Route::get('/delete/{conversation_id}', [InboxController::class, 'delete'])->name('delete');
            Route::get('/add/{conversation_id}/{user_id}', [InboxController::class, 'add'])->name('add');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/dashboard/filter', [DashboardController::class, 'filter'])->name('dashboard.filter');
        

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/{type}', [UserController::class, 'index'])->name('list');
            Route::post('/create', [UserController::class, 'create'])->name('create');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
            Route::post('/update/student/status/{id}', [UserController::class, 'updateStudentStatus'])->name('update-student-status');
            Route::post('/restore-delete/student/status/{id}', [UserController::class, 'restoreDeleteStudentStatus'])->name('restore-delete-student-status');
            Route::post('/delete', [UserController::class, 'destroy'])->name('delete');
            Route::post('/restore', [UserController::class, 'restore'])->name('restore');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('show');
        });

        Route::prefix('subject-codes')->name('subject-codes.')->group(function () {
            Route::get('/', [SubjectCodeController::class, 'index'])->name('list');
            Route::get('/show/{id}', [SubjectCodeController::class, 'show'])->name('show');
            Route::post('/create', [SubjectCodeController::class, 'create'])->name('create');
            Route::post('/update/{id}', [SubjectCodeController::class, 'update'])->name('update');
            Route::post('/delete', [SubjectCodeController::class, 'destroy'])->name('delete');
        });

        Route::prefix('tasks')->name('tasks.')->group(function () {
            Route::get('/', [TaskController::class, 'index'])->name('list');
            Route::get('/show/{id}', [TaskController::class, 'show'])->name('show');
            Route::get('/create', [TaskController::class, 'create'])->name('create');
            Route::post('/store', [TaskController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [TaskController::class, 'update'])->name('update');
            Route::post('/delete', [TaskController::class, 'destroy'])->name('delete');
            Route::post('/submission', [TaskController::class, 'submission'])->name('submission');
            Route::post('/delete/image', [TaskController::class, 'destroyImage'])->name('delete.image');
        });

        Route::prefix('task-submissions')->name('task-submissions.')->group(function () {
            Route::get('/show/{id}', [TaskSubmissionController::class, 'show'])->name('show');
            Route::post('/rate-and-comment/{id}', [TaskSubmissionController::class, 'rateAndComment'])->name('rate-and-comment');
        });

        Route::prefix('announcements')->name('announcements.')->group(function () {
            Route::get('/', [AnnouncementController::class, 'index'])->name('list');
            Route::post('/create', [AnnouncementController::class, 'create'])->name('create');
            Route::post('/update/{id}', [AnnouncementController::class, 'update'])->name('update');
            Route::post('/delete', [AnnouncementController::class, 'destroy'])->name('delete');
        });

        // Route::prefix('forms')->name('forms.')->group(function () {
        //     Route::get('/', [FormController::class, 'index'])->name('list');
        //     Route::get('/files', [FormController::class, 'files'])->name('files.list');
        //     Route::get('/show/{id}', [FormController::class, 'show'])->name('show');
        //     Route::get('/duplicate/{id}', [FormController::class, 'duplicate'])->name('duplicate');
        //     Route::get('/create', [FormController::class, 'create'])->name('create');
        //     Route::post('/store', [FormController::class, 'store'])->name('store');
        //     Route::get('/edit/{id}', [FormController::class, 'edit'])->name('edit');
        //     Route::post('/update/{id}', [FormController::class, 'update'])->name('update');
        //     Route::post('/delete', [FormController::class, 'destroy'])->name('delete');
        // });

        Route::prefix('faqs')->name('faqs.')->group(function () {
            Route::get('/', [FaqController::class, 'index'])->name('list');
            Route::post('/create', [FaqController::class, 'create'])->name('create');
            Route::post('/update/{id}', [FaqController::class, 'update'])->name('update');
            Route::post('/delete', [FaqController::class, 'destroy'])->name('delete');
        });

        Route::prefix('teacher-availability')->name('teacher-availability.')->group(function () {
            Route::get('/', [TeacherAvailabilityController::class, 'index'])->name('index');
            Route::post('/create', [TeacherAvailabilityController::class, 'create'])->name('create');
            Route::post('/delete', [TeacherAvailabilityController::class, 'destroy'])->name('delete');
        });


        // Forms Route
        Route::get('/forms', [FormController::class, 'index'])->name('forms.list');
        Route::prefix('forms')->group(function () {
            // Referral Form Routes
            Route::controller(ReferralFormController::class)->name('referral_form.')->group(function () {
                Route::get('/referral-form/patients-list', 'index')->name('index');
                Route::get('/referral-form/add-new-patient', 'create')->name('create');
                Route::post('/referral-form/store', 'store')->name('store');
                Route::get('/referral-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/referral-form/{id}/update', 'update')->name('update');
                Route::get('/referral-form/{id}/patient', 'show')->name('show');
                Route::post('/referral-form/delete', 'destroy')->name('delete');
                Route::get('/referral-form/{id}/download', 'download')->name('download');
            });
            // Pre - Operative Checklist Form Routes
            Route::controller(OperativeChecklistFormController::class)->name('operative_checklist_form.')->group(function () {
                Route::get('/operative-checklist-form/patients-list', 'index')->name('index');
                Route::get('/operative-checklist-form/add-new-patient', 'create')->name('create');
                Route::post('/operative-checklist-form/store', 'store')->name('store');
                Route::get('/operative-checklist-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/operative-checklist-form/{id}/update', 'update')->name('update');
                Route::get('/operative-checklist-form/{id}/patient', 'show')->name('show');
                Route::post('/operative-checklist-form/delete', 'destroy')->name('delete');
                Route::get('/operative-checklist-form/{id}/download', 'download')->name('download');
            });

            // Admitting Medical History Routes
            Route::controller(AdmittingMedicalHistoryFormController::class)->name('admitting_medical_history_form.')->group(function () {
                Route::get('/admitting-medical-history-form/patients-list', 'index')->name('index');
                Route::get('/admitting-medical-history-form/add-new-patient', 'create')->name('create');
                Route::post('/admitting-medical-history-form/store', 'store')->name('store');
                Route::get('/admitting-medical-history-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/admitting-medical-history-form/{id}/update', 'update')->name('update');
                Route::get('/admitting-medical-history-form/{id}/patient', 'show')->name('show');
                Route::post('/admitting-medical-history-form/delete', 'destroy')->name('delete');
            });

            // Patient Admission Record Routes
            Route::controller(PatientAdmissionRecordFormController::class)->name('patient_admission_record_form.')->group(function () {
                Route::get('/patient-admission-record-form/patients-list', 'index')->name('index');
                Route::get('/patient-admission-record-form/add-new-patient', 'create')->name('create');
                Route::post('/patient-admission-record-form/store', 'store')->name('store');
                Route::get('/patient-admission-record-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/patient-admission-record-form/{id}/update', 'update')->name('update');
                Route::get('/patient-admission-record-form/{id}/patient', 'show')->name('show');
                Route::post('/patient-admission-record-form/delete', 'destroy')->name('delete');
            });

            // Doctor's Order Routes
            Route::controller(DoctorsOrderFormController::class)->name('doctors_order_form.')->group(function () {
                Route::get('/doctors-order-form/patients-list', 'index')->name('index');
                Route::get('/doctors-order-form/add-new-patient', 'create')->name('create');
                Route::post('/doctors-order-form/store', 'store')->name('store');
                Route::get('/doctors-order-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/doctors-order-form/{id}/update', 'update')->name('update');
                Route::get('/doctors-order-form/{id}/patient', 'show')->name('show');
                Route::post('/doctors-order-form/delete', 'destroy')->name('delete');
                Route::post('/doctors-order-form/add-new-doctors-order', 'addNewDoctorsOrder')->name('add-new-doctors-order');
                Route::post('/doctors-order-form/edit-doctors-order', 'editDoctorsOrder')->name('edit-doctors-order');
            });

            // Pre - Operative Clearance Form Routes
            Route::controller(OperativeClearanceFormController::class)->name('operative_clearance_form.')->group(function () {
                Route::get('/operative-clearance-form/patients-list', 'index')->name('index');
                Route::get('/operative-clearance-form/add-new-patient', 'create')->name('create');
                Route::post('/operative-clearance-form/store', 'store')->name('store');
                Route::get('/operative-clearance-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/operative-clearance-form/{id}/update', 'update')->name('update');
                Route::get('/operative-clearance-form/{id}/patient', 'show')->name('show');
                Route::post('/operative-clearance-form/delete', 'destroy')->name('delete');
            });

            // Blood Glucose and Insulin Injection Monitoring Form Routes
            Route::controller(BloodGlucoseFormController::class)->name('blood_glucose_form.')->group(function () {
                Route::get('/blood-glucose-form/patients-list', 'index')->name('index');
                Route::get('/blood-glucose-form/add-new-patient', 'create')->name('create');
                Route::post('/blood-glucose-form/store', 'store')->name('store');
                Route::get('/blood-glucose-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/blood-glucose-form/{id}/update', 'update')->name('update');
                Route::get('/blood-glucose-form/{id}/patient', 'show')->name('show');
                Route::post('/blood-glucose-form/delete', 'destroy')->name('delete');
                Route::post('/blood-glucose-form/add-new-monitoring-form', 'addNewMonitoringForm')->name('add-new-monitoring-form');
                Route::post('/blood-glucose-form/edit-monitoring-form', 'editMonitoringForm')->name('edit-monitoring-form');
            });

            // IV FLOWSHEET / ADDITIVES / IV DRUG SUPPORT Routes
            Route::controller(FlowSheetFormController::class)->name('flow_sheet_form.')->group(function () {
                Route::get('/flow-sheet-form/patients-list', 'index')->name('index');
                Route::get('/flow-sheet-form/add-new-patient', 'create')->name('create');
                Route::post('/flow-sheet-form/store', 'store')->name('store');
                Route::get('/flow-sheet-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/flow-sheet-form/{id}/update', 'update')->name('update');
                Route::get('/flow-sheet-form/{id}/patient', 'show')->name('show');
                Route::post('/flow-sheet-form/delete', 'destroy')->name('delete');
                Route::post('/flow-sheet-form/add-new-flow-sheet', 'addNewFlowSheet')->name('add-new-flow-sheet');
                Route::post('/flow-sheet-form/edit-flow-sheet', 'editFlowSheet')->name('edit-flow-sheet');
            });

            // // WARD NURSES / PROGRESS NOTES Routes
            // Route::controller(NursesNotesFormController::class)->name('nurses_notes_form.')->group(function () {
            //     Route::get('/nurses-notes-form/patients-list', 'index')->name('index');
            //     Route::get('/nurses-notes-form/add-new-patient', 'create')->name('create');
            //     Route::post('/nurses-notes-form/store', 'store')->name('store');
            //     Route::get('/nurses-notes-form/{id}/edit-patient-information', 'edit')->name('edit');
            //     Route::post('/nurses-notes-form/{id}/update', 'update')->name('update');
            //     Route::get('/nurses-notes-form/{id}/patient', 'show')->name('show');
            //     Route::post('/nurses-notes-form/delete', 'destroy')->name('delete');


            //     Route::post('/nurses-notes-form/add-new-flow-sheet', 'addNewFlowSheet')->name('add-new-flow-sheet');
            // });





            // Ward Nurses Progress Notes Routes
            Route::controller(WardNursesProgressNoteController::class)->name('ward_nurses_progress_notes.')->group(function () {
                Route::get('/ward-nurses-progress-notes/patients-list', 'index')->name('index');
                Route::get('/ward-nurses-progress-notes/add-new-patient', 'create')->name('create');
                Route::post('/ward-nurses-progress-notes/store', 'store')->name('store');
                Route::get('/ward-nurses-progress-notes/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/ward-nurses-progress-notes/{id}/update', 'update')->name('update');
                Route::get('/ward-nurses-progress-notes/{id}/patient', 'show')->name('show');
                Route::post('/ward-nurses-progress-notes/delete', 'destroy')->name('delete');

                Route::get('/ward-nurses-progress-notes/add-new-progress-notes', 'addNewProgressNotes')->name('add-new-progress-notes');



                Route::post('/ward-nurses-progress-notes/create/level-of-conciousness', 'addLevelOfConsciousness')->name('add-level-of-conciousness');
                Route::post('/ward-nurses-progress-notes/create/respiratory-system', 'addRespiratorySystem')->name('add-respiratory-system');
                Route::post('/ward-nurses-progress-notes/create/cardiovascular-system', 'addCardiovascularSystem')->name('add-cardiovascular-system');
                Route::post('/ward-nurses-progress-notes/create/gastrointestinal-system', 'addGastrointestinalSystem')->name('add-gastrointestinal-system');
                Route::post('/ward-nurses-progress-notes/create/genitourinary-system', 'addGenitourinarySystem')->name('add-genitourinary-system');
                Route::post('/ward-nurses-progress-notes/create/musculosketal-system', 'addMusculosketalSystem')->name('add-musculosketal-system');
                Route::post('/ward-nurses-progress-notes/create/integumentary-system', 'addIntegumentarySystem')->name('add-integumentary-system');
                Route::post('/ward-nurses-progress-notes/create/pain-assessment', 'addPainAssessment')->name('add-pain-assessment');

                Route::post('/ward-nurses-progress-notes/create/intravenous-fluid', 'addIntravenousFluid')->name('add-intravenous-fluid');
                Route::post('/ward-nurses-progress-notes/create/doctors-visit', 'addDoctorsVisit')->name('add-doctors-visit');

                Route::post('/ward-nurses-progress-notes/create/nursing-documentation', 'addNursingDocumentation')->name('add-nursing-documentation');
                Route::post('/ward-nurses-progress-notes/create/handover-notes', 'addHandoverNotes')->name('add-handover-notes');
            });











            // Fluid Sheet Form Routes
            Route::controller(FluidBalanceSheetFormController::class)->name('fluid_balance_sheet_form.')->group(function () {
                Route::get('/fluid-balance-sheet-form/patients-list', 'index')->name('index');
                Route::get('/fluid-balance-sheet-form/add-new-patient', 'create')->name('create');
                Route::post('/fluid-balance-sheet-form/store', 'store')->name('store');
                Route::get('/fluid-balance-sheet-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/fluid-balance-sheet-form/{id}/update', 'update')->name('update');
                Route::get('/fluid-balance-sheet-form/{id}/patient', 'show')->name('show');
                Route::post('/fluid-balance-sheet-form/delete', 'destroy')->name('delete');

                Route::post('/fluid-balance-sheet-form/add-new-first-shift', 'addNewFirstShift')->name('add-new-first-shift');
                Route::post('/fluid-balance-sheet-form/edit-first-shift', 'editFirstShift')->name('edit-first-shift');

                Route::post('/fluid-balance-sheet-form/add-new-second-shift', 'addNewSecondShift')->name('add-new-second-shift');
                Route::post('/fluid-balance-sheet-form/edit-second-shift', 'editSecondShift')->name('edit-second-shift');

                Route::post('/fluid-balance-sheet-form/add-new-third-shift', 'addNewThirdShift')->name('add-new-third-shift');
                Route::post('/fluid-balance-sheet-form/edit-third-shift', 'editThirdShift')->name('edit-third-shift');
            });

            // Medication Administration Record Form Routes
            Route::controller(MedicationRecordFormController::class)->name('medication_record_form.')->group(function () {
                Route::get('/medication-record-form/patients-list', 'index')->name('index');
                Route::get('/medication-record-form/add-new-patient', 'create')->name('create');
                Route::post('/medication-record-form/store', 'store')->name('store');
                Route::get('/medication-record-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/medication-record-form/{id}/update', 'update')->name('update');
                Route::get('/medication-record-form/{id}/patient', 'show')->name('show');
                Route::post('/medication-record-form/delete', 'destroy')->name('delete');

                Route::post('/medication-record-form/add-new-prn', 'addNewPRN')->name('add-new-prn');
                Route::post('/medication-record-form/edit-prn', 'editPRN')->name('edit-prn');

                Route::post('/medication-record-form/add-new-single-order-stat', 'addNewSingleOrderStat')->name('add-new-single-order-stat');
                Route::post('/medication-record-form/edit-single-order-stat', 'editSingleOrderStat')->name('edit-single-order-stat');
            });

            // Vital Signs Sheet Routes
            Route::controller(VitalSignSheetFormController::class)->name('vital_sign_sheet_form.')->group(function () {
                Route::get('/vital-sign-sheet-form/patients-list', 'index')->name('index');
                Route::get('/vital-sign-sheet-form/add-new-patient', 'create')->name('create');
                Route::post('/vital-sign-sheet-form/store', 'store')->name('store');
                Route::get('/vital-sign-sheet-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/vital-sign-sheet-form/{id}/update', 'update')->name('update');
                Route::get('/vital-sign-sheet-form/{id}/patient', 'show')->name('show');
                Route::post('/vital-sign-sheet-form/delete', 'destroy')->name('delete');
                Route::post('/vital-sign-sheet-form/add-new-vital-sign', 'addNewVitalSign')->name('add-new-vital-sign');
                Route::post('/vital-sign-sheet-form/edit-vital-sign', 'editVitalSign')->name('edit-vital-sign');
            });

            // Discharge Orders Routes
            Route::controller(DischargeOrdersFormController::class)->name('discharge_orders_form.')->group(function () {
                Route::get('/discharge-order-form/patients-list', 'index')->name('index');
                Route::get('discharge-orders-form/add-new-patient', 'create')->name('create');
                Route::post('discharge-orders-form/store', 'store')->name('store');
                Route::get('discharge-orders-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('discharge-orders-form/{id}/update', 'update')->name('update');
                Route::get('discharge-orders-form/{id}/patient', 'show')->name('show');
                Route::post('discharge-orders-form/delete', 'destroy')->name('delete');
            });

            // Discharge Clinical Summary Routes
            Route::controller(DischargeClinicalSummaryFormController::class)->name('discharge_clinical_summary_form.')->group(function () {
                Route::get('/discharge-clinical-summary-form/patients-list', 'index')->name('index');
                Route::get('/discharge-clinical-summary-form/add-new-patient', 'create')->name('create');
                Route::post('/discharge-clinical-summary-form/store', 'store')->name('store');
                Route::get('/discharge-clinical-summary-form/{id}/edit-patient-information', 'edit')->name('edit');
                Route::post('/discharge-clinical-summary-form/{id}/update', 'update')->name('update');
                Route::get('/discharge-clinical-summary-form/{id}/patient', 'show')->name('show');
                Route::post('/discharge-clinical-summary-form/delete', 'destroy')->name('delete');
            });

            // Informed Consents [admission, treatment, surgery] Routes
            Route::get('informed-consent-admission-form/show', [InformedConsentAdmissionFormController::class, 'show'])->name('informed_consent_admission_form.show');
            Route::get('informed-consent-treatment-form/show', [InformedConsentTreatmentFormController::class, 'show'])->name('informed_consent_treatment_form.show');
            Route::get('informed-consent-surgery-form/show', [InformedConsentSurgeryFormController::class, 'show'])->name('informed_consent_surgery_form.show');
        });
    });
});
