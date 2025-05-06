<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $table = 'days';

    protected $fillable = [
        'program_id',
        'day_number',
        'image',
    ];

    protected $casts = [
        'day_number' => 'integer',
    ];

    // 🔗 Принадлежит Программе
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    // 🔗 Переводы
    public function translations()
    {
        return $this->hasMany(DayTranslation::class);
    }

    public function translation($locale = 'ru')
    {
        return $this->translations->where('locale', $locale)->first();
    }

    public function getTitleRuAttribute()
    {
        return $this->translation('ru')?->title;
    }

    public function getDescriptionRuAttribute()
    {
        return $this->translation('ru')?->description;
    }

    public function getTitleEnAttribute()
    {
        return $this->translation('en')?->title;
    }

    public function getDescriptionEnAttribute()
    {
        return $this->translation('en')?->description;
    }
}
