<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class OperativeChecklistForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',

        'room_no',
        'date_of_surgery',
        'sex',
        'date_of_birth',
        'case_no',

        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',

        'surgeon_first_name',
        'surgeon_middle_name',
        'surgeon_last_name',

        'anesthesiologist_first_name',
        'anesthesiologist_middle_name',
        'anesthesiologist_last_name',

        'preoperative_diagnosis',

        'operative_cl_1',
        'operative_cl_2',

        'operative_cl_3',
        'operative_cl_3_physician_first_name',
        'operative_cl_3_physician_middle_name',
        'operative_cl_3_physician_last_name',

        'operative_cl_4',
        'operative_cl_5',

        'operative_cl_6',
        'operative_cl_6_npo_date_time',

        'operative_cl_7_a',
        'operative_cl_7_b',

        'operative_cl_8',
        'operative_cl_9',
        'operative_cl_10',
        'operative_cl_11',
        'operative_cl_12',
        'operative_cl_13',

        'operative_cl_14',
        'operative_cl_14_units_ordered',
        'operative_cl_14_units_avail',
        'operative_cl_14_type',
        'operative_cl_14_serial_number',
        'operative_cl_14_crossed_match',
        'operative_cl_14_kind',
        'operative_cl_14_kind_cl_1',
        'operative_cl_14_kind_cl_2',
        'operative_cl_14_kind_cl_3',
        'operative_cl_14_kind_cl_4',
        'operative_cl_14_kind_cl_5',
        'operative_cl_14_kind_cl_others',

        'operative_cl_15',
        'operative_cl_15_solution_type',
        'operative_cl_15_remaining_amount',

        'operative_cl_16',
        'operative_cl_16_temp',
        'operative_cl_16_bp',
        'operative_cl_16_pulse',
        'operative_cl_16_resp',
        'operative_cl_16_time',

        'operative_cl_17',
        'operative_cl_17_drainage_amount',
        'operative_cl_17_voided_time',

        'operative_cl_18',
        'operative_cl_19',
        'operative_cl_20',

        'operative_cl_21',
        'operative_cl_21_preop_med_given',
        'operative_cl_21_dosage',
        'operative_cl_21_route_site',
        'operative_cl_21_time_given',

        'operative_cl_22',
        'operative_cl_22_time_transferred_to_or',

        'operative_cl_23',
        'operative_cl_23_orderly_name',
        'operative_cl_23_nurse_on_duty_name',

        'operative_cl_24',
        'operative_cl_24_nurse_on_duty_name',
        'operative_cl_24_date_time',

        'operative_cl_25',
        'operative_cl_25_time_patient_rcvd_in_or',
        'operative_cl_25_or_nurse_on_duty',

        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
