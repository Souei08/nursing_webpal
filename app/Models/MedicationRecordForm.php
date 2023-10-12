<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class MedicationRecordForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',

        'date_of_birth',

        'allergies',
        'gender',
        'room_no',

        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',

        'date',
        'patient_id',

        'prn_date_ordered',
        'prn_medication',
        'prn_date_time',
        'prn_remarks',

        'single_order_stat_date_ordered',
        'single_order_stat_medication',
        'single_order_stat_date_time',
        'single_order_stat_remarks',

        'date_ordered',
        'medication',
        'date_time_given',
        'initials',

        'nurse_staff_first_name',
        'nurse_staff_middle_name',
        'nurse_staff_last_name',

        'user_id',

    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
