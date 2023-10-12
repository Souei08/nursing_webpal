<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class NursingDocumentation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nursing_documentation_time',
        'nursing_documentation_problems',

        'nursing_documentation_shift',

        'user_id',
        'ward_nurses_progress_note_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
