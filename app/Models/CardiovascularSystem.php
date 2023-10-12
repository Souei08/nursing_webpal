<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CardiovascularSystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'cs_regular',
        'cs_irregular',
        'cs_weak',
        'cs_bounding',

        'cs_secs',

        'cs_no',
        'cs_yes',

        'cs_location',
        'cs_others',

        'cs_shift',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
