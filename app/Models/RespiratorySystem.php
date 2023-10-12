<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RespiratorySystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'rs_clear',
        'rs_location_r',
        'rs_location_l',
        'rs_location_adventitous',

        'rs_adventitous_specify',
        'rs_location',
        
        'rs_lpm',
        'rs_via',

        'rs_oxygen',
        'rs_intubated',
        'rs_cpap',
        'rs_bipap',
        'rs_et_tube',
        
        'rs_size',
        'rs_level',
        
        'rs_f',
        'rs_rr',
        'rs_peep',
        'rs_tv',
        'rs_ie',
        'rs_sat',
        
        'rs_others',
        'rs_shift',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
