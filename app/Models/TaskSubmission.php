<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };

class TaskSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'task_id',
        'description',
        'comment',
        'rating',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function taskSubmissionFiles(): HasMany
    {
        return $this->hasMany(TaskSubmissionFile::class, 'task_submission_id');
    }
}
