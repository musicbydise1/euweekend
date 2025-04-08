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
        'image'
        // 'day_date', // если используете
        // 'is_active',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function translations()
    {
        return $this->hasMany(DayTranslation::class);
    }
}
