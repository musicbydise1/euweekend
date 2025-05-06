<?php

namespace App\Filament\Admin\Resources\ProgramCategoryResource\Pages;

use App\Filament\Admin\Resources\ProgramCategoryResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use App\Models\ProgramCategory;

class CreateProgramCategory extends CreateRecord
{
    protected static string $resource = ProgramCategoryResource::class;

    // Здесь мы просто изменяем данные и возвращаем их,
    // чтобы Filament выполнил стандартный create.
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Если поле slug пустое, генерируем его из title_ru
        if (empty($data['slug'])) {
            // Генерируем базовый slug из title_ru или используем 'program-category'
            $slug = Str::slug($data['title_en'] ?? 'program-category');
            $originalSlug = $slug;
            $counter = 1;

            // Проверяем уникальность slug
            while (ProgramCategory::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }

            $data['slug'] = $slug;
        }

        return $data;
    }

    // После стандартного создания записи добавляем переводы
    protected function afterCreate($record = null): void
    {
        $record = $record ?? $this->record;

        $record->translations()->createMany([
            [
                'locale' => 'ru',
                'title' => $this->data['title_ru'] ?? '',
                'description' => $this->data['description_ru'] ?? '',
            ],
            [
                'locale' => 'en',
                'title' => $this->data['title_en'] ?? '',
                'description' => $this->data['description_en'] ?? '',
            ],
        ]);
    }

}
