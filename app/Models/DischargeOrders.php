<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class DischargeOrders extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_first_name',
        'patient_middle_name',
        'patient_last_name',

        'room',
        'case_no',

        'date_of_birth',
        'sex',

        'may_go_home',
        'home_against_advice',

        'medications',
        'follow_up_at',
        'follow_up_address',

        'laboratory_request',
        'laboratory_results_for_follow_up',
        'advised',

        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',

        'created_by',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by')->withTrashed();
    }
}
