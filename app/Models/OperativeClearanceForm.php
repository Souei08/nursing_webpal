<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class OperativeClearanceForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',

        'room_no',

        'date_of_surgery',
        'date_of_birth',
        'sex',
        'case_no',

        'attending_physician_fname',
        'attending_physician_mname',
        'attending_physician_lname',

        'working_diagnosis',
        'surgery_contemplated',
        'anesthesia_contemplated',
        'tentative_sched',
        'history',
        'smoking',
        'alcohol_intake',
        'allergies',
        'prev_hospitalization',
        'prev_operation',
        'recent_med_intake',

        'normal_general',
        'normal_skin',
        'normal_eent',
        'normal_respiratory',
        'normal_cardio',
        'normal_gastro',
        'normal_renal',
        'normal_gyne',
        'normal_male',
        'normal_musculo',
        'normal_hematological',
        'normal_endocrine',
        'normal_nervous',

        'abnormal_general',
        'abnormal_skin',
        'abnormal_eent',
        'abnormal_respiratory',
        'abnormal_cardio',
        'abnormal_gastro',
        'abnormal_renal',
        'abnormal_gyne',
        'abnormal_male',
        'abnormal_musculo',
        'abnormal_hematological',
        'abnormal_endocrine',
        'abnormal_nervous',

        'bp',
        'cr',
        'rr',
        'temp',
        'skin',
        'heent',
        'neck',
        'chest_lungs',
        'heart',
        'abdomen',
        'musculoskeletal',
        'neurological',

        'chest_xray',
        'ecg',
        'echo',

        'cbc',
        'urinalysis',
        'others',

        'fbs',
        'creatinine',
        'sgpt',

        'protime',
        'aptt',
        'bleeding_time',


        'high_risk_surgery',
        'coronary_artery_disease_presence',
        'congestion_heart_failure_presence',
        'cerebrovascular_disease',
        'diabetes_mellitus_insulin',
        'serum_creatinine',

        'total_score_per_yes',

        'assessment_suggestion_recommendation',

        'medical_consultant_first_name',
        'medical_consultant_middle_name',
        'medical_consultant_last_name',

        'user_id',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
