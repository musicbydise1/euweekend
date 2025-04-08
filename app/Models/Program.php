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
    ];

    public function translations()
    {
        return $this->hasMany(ProgramTranslation::class);
    }

    public function category()
    {
        return $this->belongsTo(ProgramCategory::class, 'program_category_id');
    }

    public function daysRelations() // чтобы не путать с колонкой days
    {
        return $this->hasMany(Day::class);
    }
}
