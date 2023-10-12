<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class PatientAdmissionRecordForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',
        'patient_suffix_name',
        'admission_no',
        'patient_id_no',
        'm_r_locator',
        'room_no',
        'civil_status',
        'nationality',
        'patient_tel_no',
        'sex',
        'address',
        'birth_place',
        'date_of_birth',
        'religion',
        
        'patient_occupation',
        'patient_company',
        'patient_occupation_address',
        'patient_company_tel',
        
        'father',
        'f_occupation',
        'f_occupation_address',
        'f_tel_no',
        
        'mother',
        'm_occupation',
        'm_occupation_address',
        'm_tel_no',
        
        'spouse',
        's_occupation',
        's_occupation_address',
        's_tel_no',
        
        'in_case_of_emergency_fullname',
        'e_address',
        'relation_to_patient',
        'e_tel_no',
        'admitting_check_nurse',
        'hospitalization_plan',
        'service_type',
        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',
        'admission_date_time',
        'discharge_date_time',
        
        'guardian_fullname',
        'guardian_relationship',
        
        'provisional_diagnosis',
        'discharge_diagnosis',
        'operations',
        
        'disposition',
        'result',
        'resident_on_duty',

        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
