<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MusculosketalSystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ms_posture',
        'ms_posture_others',

        'ms_gait',
        'ms_gait_others',

        'ms_rom',
        'ms_rom_others',

        'ms_assistive_device',
        'ms_contraption',
        'ms_mfs_score',

        'ms_mfs_side-rails_yes',
        'ms_mfs_side-rails_no',

        'ms_others',
        'ms_shift',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
