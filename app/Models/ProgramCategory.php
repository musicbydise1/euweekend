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
    ];

    // 🔗 Программы, входящие в категорию
    public function programs()
    {
        return $this->hasMany(Program::class, 'program_category_id');
    }

    // 🔗 Переводы
    public function translations()
    {
        return $this->hasMany(ProgramCategoryTranslation::class);
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
