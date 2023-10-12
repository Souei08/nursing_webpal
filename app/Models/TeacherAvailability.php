<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo };

class TeacherAvailability extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'day',
        'time_start',
        'time_end',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
