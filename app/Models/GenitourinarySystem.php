<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class GenitourinarySystem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'gen_freely',
        'gen_incontinence',
        'gen_dysuria',
        'gen_anuria',
        'gen_urine_color_clear',

        'gen_urine_color_clear_others',
        
        'gen_catheterized',
        'gen_fr',
        
        'gen_date_insertion',
        
        'gen_others',

        'gen_shift',

        'user_id',
        'ward_nurses_progress_note_id',      
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
