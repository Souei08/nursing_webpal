<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class IntegumentarySystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'is_color_specify',
        'is_score',
        'is_risk_lvl',

        'is_change_position',
        'is_air_mattress',
        'is_dressing',
        'is_medication',

        'is_intervention_others',

        'is_skin_tugor_good',
        'is_skin_tugor_poor',

        'is_integrity_intact',
        'is_integrity_nonintact',

        'is_others',

        'is_shift',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
