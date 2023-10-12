<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class AdmittingMedicalHistoryForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_last_name',
        'patient_first_name',
        'patient_middle_name',
        'date_of_birth',

        'sex',

        'admission_date_time',

        'chief_complaint',
        'referred_from_hci',
        'yes_reason',
        'originating_hci_name',

        'present_illness_history',
        'pertinent_past_medical_history',

        'g',
        'p',
        'gp_1',
        'gp_2',
        'gp_3',
        'gp_4',
        'lmp',


        'allergies',
        'smoker',
        'alcohol_drinks',

        'altered_mental_sensorium',
        'abdominal_cramp_pain',
        'anorexia',
        'bleeding_gums',
        'body_weakness',
        'vision_blurring',
        'chestpain_discomfort',
        'constipation',
        'cough',
        'diarrhea',
        'dizziness',
        'dysphagia',
        'dyspnea',
        'dysuria',
        'epistaxis',
        'fever',
        'urination_frequency',
        'headache',
        'hematemesis',
        'hematuria',
        'hemoptysis',
        'irritability',
        'jaundice',
        'lower_extremity_edema',
        'myalgia',
        'orthopnea',
        'pain', 'pain_site',
        'palpitations',
        'seizures',
        'skin_rashes',
        'stool_bloodyblack_tarrymucoid',
        'sweating',
        'urgency',
        'vomiting',
        'weight_loss',
        'symptoms_others',

        'general_survey',
        'general_survey_altered_sensorium',

        'bp',
        'hr',
        'rr',
        'temp',
        'sat',
        'height',
        'weight',

        'heent',
        'heent_others',

        'chest_lungs',
        'chest_lungs_others',

        'cvs',
        'cvs_others',
        'abdomen',
        'abdomen_others',
        'gu',
        'gu_others',
        'skin_extremities',
        'skin_extremities_others',
        'neuro_exam',
        'neuro_exam_others',
        'digital_rectal',
        'digital_rectal_others',

        'eyes_open',
        'best_verbal_response',
        'best_motor_response',
        'total_score',

        'admitting_impression',

        'total_score',

        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
