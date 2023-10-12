<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class ReferralForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',
        'address',
        'date_of_birth',
        'sex',
        'patient_no',
        'problem_referred',
        'for',
        'referred_to',

        'referrer_first_name',
        'referrer_middle_name',
        'referrer_last_name',
        'referrer_relationship_to_patient',

        'subjective_findings',
        'objective_findings',
        'assessment',
        'plan',
        'consultant_first_name',
        'consultant_middle_name',
        'consultant_last_name',

        'created_by',
        'consulted_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
