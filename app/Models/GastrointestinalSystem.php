<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GastrointestinalSystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'gas_diet',

        'gas_oral',
        'gas_apetite',
        'gas_good',
        'gas_fair',
        'gas_minimal',
        'gas_ngt',
        'gas_r',
        'gas_l',
        'gas_peg',

        'gas_french',

        'gas_date_time',

        'gas_bowel_sound_yes',
        'gas_bowel_sound_no',

        'gas_others',
        'gas_shift',

        'user_id',
        'ward_nurses_progress_note_id',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
