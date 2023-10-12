<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Model\PaperclipTrait;
use Illuminate\Database\Eloquent\Relations\{ BelongsTo, HasMany };
use Czim\Paperclip\Config\Variant;
use Czim\Paperclip\Config\Steps\AutoOrientStep;
use Czim\Paperclip\Config\Steps\ResizeStep;

class MessageImage extends Model implements AttachableInterface
{
    use HasFactory, PaperclipTrait;

    protected $fillable = [
        'message_id', 
        'images'
    ];

    protected $appends = [
        'image',
    ];

    public function __construct(array $attributes = [])
    {
       $this->hasAttachedFile('images', [
            'variants'  => [
                'thumb' => ResizeStep::make()->square(100),
                Variant::make('card')->steps([
                    AutoOrientStep::make(),
                    ResizeStep::make()->width(400),
                ]),
                Variant::make('mobile')->steps([
                    AutoOrientStep::make(),
                    ResizeStep::make()->width(600),
                ]),
                Variant::make('landscape')->steps([
                    AutoOrientStep::make(),
                    ResizeStep::make()->width(300),
                ]),
                Variant::make('portrait')->steps([
                    AutoOrientStep::make(),
                    ResizeStep::make()->height(300),
                ]),
            ],
        ]);

        parent::__construct($attributes);
    }

    public function getImageAttribute()
    {
        return $this->images->url();
    }

    public function message(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'id')->withTimestamps();
    }
}
