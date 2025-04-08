<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramCategoryTranslation extends Model
{
    use HasFactory;

    protected $table = 'program_category_translations';

    protected $fillable = [
        'program_category_id',
        'locale',
        'title',
        'description',
    ];

    public function programCategory()
    {
        return $this->belongsTo(ProgramCategory::class);
    }
}
