<?php

namespace App\Filament\Admin\Resources\ProgramResource\Pages;

use App\Filament\Admin\Resources\ProgramResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use App\Models\Program;

class CreateProgram extends CreateRecord
{
    protected static string $resource = ProgramResource::class;

    // Здесь мы просто модифицируем входящие данные и возвращаем их,
    // чтобы стандартный метод создания записи запустился с этими данными.
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Если поле slug пустое, генерируем его из title_ru
        if (empty($data['slug'])) {
            $slug = Str::slug($data['title_en'] ?? 'program');
            $originalSlug = $slug;
            $counter = 1;
            while (Program::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }
        return $data;
    }

    // После стандартного создания записи добавляем переводы.
    // Используем $this->data для доступа к данным формы.
    protected function afterCreate($record = null): void
    {
        $record = $record ?? $this->record;

        $record->translations()->createMany([
            [
                'locale'      => 'ru',
                'title'       => $this->data['title_ru'] ?? '',
                'description' => $this->data['description_ru'] ?? '',
            ],
            [
                'locale'      => 'en',
                'title'       => $this->data['title_en'] ?? '',
                'description' => $this->data['description_en'] ?? '',
            ],
        ]);
    }
}
