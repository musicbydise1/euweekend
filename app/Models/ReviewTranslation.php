<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReviewTranslation extends Model
{
    protected $table = 'review_translations';

    // Какие поля можно массово присваивать
    protected $fillable = [
        'review_id',
        'locale',
        'content',
    ];

    /**
     * Связь с основной моделью отзывов.
     */
    public function review(): BelongsTo
    {
        return $this->belongsTo(Review::class);
    }
}
