<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramTranslation extends Model
{
    use HasFactory;

    protected $table = 'program_translations';

    protected $fillable = [
        'program_id',
        'locale',
        'title',
        'description',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
