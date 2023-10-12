<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany, HasOne };
use Illuminate\Support\Facades\Redis;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $appends = [
        'unread',
    ];

    public function redis()
    {
        return Redis::connection('conversations');
    }

    public function getUnreadAttribute()
    {
        if (auth()->check()) {
            $key = 'conversations-'.auth()->user()->id.'-'.$this->id;

            return $this->redis()->exists($key) ? (int) $this->redis()->get($key) : 0;
        }

        return 0;
    }

    public function participants(): HasMany
    {
        return $this->hasMany(Participant::class, 'conversation_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'conversation_id');
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class, 'conversation_id')->with(['user'])->latest();
    }
}
