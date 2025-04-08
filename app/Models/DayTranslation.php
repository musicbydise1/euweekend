<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTranslation extends Model
{
    use HasFactory;

    protected $table = 'day_translations';

    protected $fillable = [
        'day_id',
        'locale',
        'day',
        'title',
        'description',
    ];

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
