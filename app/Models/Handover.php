<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Handover extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'handover_notes',
        'handover_name',

        'handover_shift',

        'user_id',
        'ward_nurses_progress_note_id',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
