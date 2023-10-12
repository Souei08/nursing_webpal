<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'conversation_id',
        'user_id',
        'message',
        'read_at',
    ];

    protected $appends = [
        'is_owned'
    ];

    public function getIsOwnedAttribute()
    {
        if (! auth()->check()) {
            return false;
        }
        
        return $this->user_id === auth()->user()->id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    public function messageImages(): HasMany
    {
        return $this->hasMany(MessageImage::class, 'message_id');
    }
}
