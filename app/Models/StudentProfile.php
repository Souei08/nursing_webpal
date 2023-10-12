<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo };

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_code_id',
        'student_no',
        'status',
    ];

    protected $appends = [
        'analytic',
    ];

    public function getAnalyticsByCategory($category)
    {
        $taskSubmittions = TaskSubmission::where(['user_id' => $this->user_id]);

        $taskSubmittions->whereHas('task', function ($query) use ($category) {
            return $query->where('category', '=', $category);
        });

        if ($taskSubmittions->count() === 0) {
            return  number_format(0); 
        }

        $oneH = ($taskSubmittions->count() * 10);

        $percent = $taskSubmittions->sum('rating') / $oneH; 

        return  number_format($percent * 100, 2); 
    }

    public function getAnalyticAttribute()
    {
        return [
            'Informatics Skill' => $this->getAnalyticsByCategory('Informatics Skill'),
            'Informatics Knowledge' => $this->getAnalyticsByCategory('Informatics Knowledge'),
            'Computer Skills' => $this->getAnalyticsByCategory('Computer Skills')
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function subjectCode(): BelongsTo
    {
        return $this->belongsTo(SubjectCode::class);
    }
}
