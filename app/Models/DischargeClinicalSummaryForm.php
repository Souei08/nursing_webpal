<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};


class DischargeClinicalSummaryForm extends Model
{
    use HasFactory, SoftDeletes;

    
    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',

        'date_of_birth',
        'sex',

        'hospital_no',
        'address',

        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',

        'date_admitted',
        'date_discharged',

        'chief_complaint',
        'brief_clinical_summary',
        'physician_examination',

        'bp',
        'cr',
        'rr',
        'temp',
        'abdomen',
        'heent',
        'gu',
        'chest_lungs',
        'skin_extremities',
        'cvs',
        'cns',


        'laboratory_findings',
        'treatment_course',
        'final_diagnosis',
        'recommendation',
        'disposition_discharge',

        'resident_incharge_first_name',
        'resident_incharge_middle_name',
        'resident_incharge_last_name',

        'date_accomplished',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
