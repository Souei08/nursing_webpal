<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class FluidBalanceSheetForm extends Model
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

        'patient_id',

        'first_shift_ivf_one',
        'first_shift_ivf_two',
        'first_shift_intake_others',
        'first_shift_blood',
        'first_shift_tpn',
        'first_shift_tube',
        'first_shift_oral',
        'first_shift_urine',
        'first_shift_drain',
        'first_shift_stool',
        'first_shift_output_others',
        'first_shift_total',
        'first_shift_total_per_shift_intake',
        'first_shift_total_per_shift_output',
        'first_shift_balance_per_shift',
        'first_shift_nod',

        'second_shift_ivf_one',
        'second_shift_ivf_two',
        'second_shift_intake_others',
        'second_shift_blood',
        'second_shift_tpn',
        'second_shift_tube',
        'second_shift_oral',
        'second_shift_urine',
        'second_shift_drain',
        'second_shift_stool',
        'second_shift_output_others',
        'second_shift_total',
        'second_shift_total_per_shift_intake',
        'second_shift_total_per_shift_output',
        'second_shift_balance_per_shift',
        'second_shift_nod',

        'third_shift_ivf_one',
        'third_shift_ivf_two',
        'third_shift_intake_others',
        'third_shift_blood',
        'third_shift_tpn',
        'third_shift_tube',
        'third_shift_oral',
        'third_shift_urine',
        'third_shift_drain',
        'third_shift_stool',
        'third_shift_output_others',
        'third_shift_total',
        'third_shift_total_per_shift_intake',
        'third_shift_total_per_shift_output',
        'third_shift_balance_per_shift',
        'third_shift_nod',

        'user_id',

    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
