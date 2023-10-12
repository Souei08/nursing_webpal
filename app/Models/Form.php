<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo };

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    // protected $fillable = [
    //     'user_id',
    //     'title',
    //     'html',
    //     'readonly',
    // ];

    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class)->withTrashed();
    // }
}
