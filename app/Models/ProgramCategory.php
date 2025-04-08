<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCategory extends Model
{
    use HasFactory;

    protected $table = 'program_categories';

    protected $fillable = [
        'slug',
        // 'is_active' // если нужно
    ];

    public function translations()
    {
        return $this->hasMany(ProgramCategoryTranslation::class);
    }

    // Пример связи, если у категории есть много программ
    public function programs()
    {
        return $this->hasMany(Program::class, 'program_category_id');
    }
}
