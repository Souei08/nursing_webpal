<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class BloodGlucoseForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',
        'room_no',
        'date_of_birth',
        'gender',
        'allergies',
        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',
        'patient_id',
        'referred_to',
        'insulin_given',
        'administered_by',
        'signature',
        'remarks',
        'date_time',
        'hgt',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
