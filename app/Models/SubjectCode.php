<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };

class SubjectCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'start_year',
        'end_year',
        'semester',
        'term',
        'description',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function students(): HasMany
    {
        return $this->hasMany(StudentProfile::class, 'subject_code_id');
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'subject_code_id');
    }
}
