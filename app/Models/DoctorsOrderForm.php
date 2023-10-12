<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo, HasOne, BelongsToMany, MorphToMany};

class DoctorsOrderForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'room_no',
        'date_of_birth',
        'gender',
        'allergies',
        'attending_physician_first_name',
        'attending_physician_middle_name',
        'attending_physician_last_name',
        'patient_id',
        'doctors_order_date',
        'progress_note',
        'doctors_order',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
