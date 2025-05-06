<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'slug',
        'program_category_id',
        'is_premium',
        'price',
        'days',
        'start_time',
        'end_time',
        'duration_hours',
        'stock',
        'image',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'is_premium' => 'boolean',
        'price' => 'float',
        'days' => 'integer',
        'duration_hours' => 'integer',
        'stock' => 'integer',
    ];

    // 🔗 Переводы
    public function translations()
    {
        return $this->hasMany(ProgramTranslation::class);
    }

    public function translation($locale = 'ru')
    {
        return $this->translations->where('locale', $locale)->first();
    }

    public function getTitleRuAttribute()
    {
        return $this->translations->where('locale', 'ru')->first()?->title;
    }

    public function getDescriptionRuAttribute()
    {
        return $this->translation('ru')?->description;
    }

    public function getTitleEnAttribute()
    {
        return $this->translations->where('locale', 'en')->first()?->title;
    }

    public function getDescriptionEnAttribute()
    {
        return $this->translation('en')?->description;
    }

    // 🔗 Категория
    public function category()
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }

    // 🔗 Дни
    public function daysRelations()
    {
        return $this->hasMany(Day::class);
    }
}
