<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorsVisit extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'dv_time',
        'dv_doctors_name',
        'dv_remarks',

        'dv_type_time',
        'dv_type',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
