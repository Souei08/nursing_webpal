<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LevelOfConsciousness extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'lvl_of_consciousness_conscious',
        'lvl_of_consciousness_lethargic',
        'lvl_of_consciousness_stupor',
        'lvl_of_consciousness_obtunded',
        'lvl_of_consciousness_coma',
        'lvl_of_consciousness_on_sedation',
        'lvl_of_consciousness_e',
        'lvl_of_consciousness_v',
        'lvl_of_consciousness_m',
        'lvl_of_consciousness_equal',
        'lvl_of_consciousness_others',
        'lvl_of_consciousness_shift',

       'user_id',
       'ward_nurses_progress_note_id',
       
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

}
