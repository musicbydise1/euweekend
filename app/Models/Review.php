<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    // Таблица в БД
    protected $table = 'reviews';

    // Заполняемые поля (если вы используете Mass Assignment)
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'country',
        'age',
        'avatar',
        'video_url',
        // 'content', // если бы вы хранили контент и в основной таблице
    ];

    /**
     * Связь "один ко многим" с таблицей review_translations.
     * Каждая запись reviews может иметь много переводов.
     */
    public function translations(): HasMany
    {
        return $this->hasMany(ReviewTranslation::class);
    }

    /**
     * Пример метода для получения перевода по нужной локали (locale).
     *
     * @param string|null $locale
     * @return string|null
     */
    public function getTranslatedContent(?string $locale = null): ?string
    {
        // Если не указана локаль, можно взять текущую из App::getLocale()
        if (!$locale) {
            $locale = app()->getLocale();
        }

        // Ищем перевод
        $translation = $this->translations->where('locale', $locale)->first();

        // Возвращаем, если нашли
        return $translation ? $translation->content : null;
    }
}
