<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'slug',
        // 'title', 'content', // если бы вы хранили заголовок/контент и в основной таблице
    ];

    /**
     * Связь "один ко многим" с таблицей article_translations.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ArticleTranslation::class);
    }

    /**
     * Получаем перевод конкретного поля (title/content) по локали.
     */
    public function getTranslatedTitle(?string $locale = null): ?string
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        $translation = $this->translations->where('locale', $locale)->first();
        return $translation ? $translation->title : null;
    }

    public function getTranslatedContent(?string $locale = null): ?string
    {
        if (!$locale) {
            $locale = app()->getLocale();
        }

        $translation = $this->translations->where('locale', $locale)->first();
        return $translation ? $translation->content : null;
    }
}
