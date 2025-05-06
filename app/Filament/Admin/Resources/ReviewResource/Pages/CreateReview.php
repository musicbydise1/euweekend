<?php

namespace App\Filament\Admin\Resources\ReviewResource\Pages;

use App\Filament\Admin\Resources\ReviewResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReview extends CreateRecord
{
    protected static string $resource = ReviewResource::class;

    protected function afterCreate($record = null): void
    {
        $record = $record ?? $this->record;
        // Создаем переводы для отзыва
        $record->translations()->create([
            'locale'  => 'ru',
            'content' => $this->data['content_ru'] ?? '',
        ]);
        $record->translations()->create([
            'locale'  => 'en',
            'content' => $this->data['content_en'] ?? '',
        ]);
    }
}
