<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo };
use App\Helpers\Utils;
use Illuminate\Support\Str;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_code_id',
        'category',
        'title',
        'slug_title',
        'body',
        'status',
    ];

    protected $appends = [
        'parsed_images',
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug_title'] = Str::slug($value);
    }

    public function getParsedImagesAttribute()
    {
        if (empty($this->attributes['body'])) {
            return [];
        }

        return Utils::parseImagesFromHtml($this->attributes['body']);
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
