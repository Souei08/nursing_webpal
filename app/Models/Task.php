<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'subject_code_id',
        'category',
        'title',
        'deadline',
        'instructions',
        'scenario',
    ];

    protected $appends = [
        'is_active',
    ];

    public function getIsActiveAttribute()
    {

        return Carbon::parse($this->deadline)->isFuture();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function subjectCode(): BelongsTo
    {
        return $this->belongsTo(SubjectCode::class);
    }

    public function taskSubmissions(): HasMany
    {
        return $this->hasMany(TaskSubmission::class, 'task_id');
    }

    public function taskFiles(): HasMany
    {
        return $this->hasMany(TaskFile::class, 'task_id');
    }
}
