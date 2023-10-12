<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PainAssessment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'pa_pain_yes',
        'pa_pain_no',

        'pa_score',
        'pa_tool_used',

        'pa_tool_pattern',
        'pa_tool_pattern_blank',

        'pa_tool_quality',
        'pa_tool_quality_blank',

        'pa_tool_region',
        'pa_tool_region_blank',

        'pa_tool_severity',
        'pa_tool_severity_blank',

        'pa_others',

        'pa_shift',

        'user_id',
        'ward_nurses_progress_note_id',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
