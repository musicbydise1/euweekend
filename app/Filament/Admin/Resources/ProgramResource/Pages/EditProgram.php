<?php

namespace App\Filament\Admin\Resources\ProgramResource\Pages;

use App\Filament\Admin\Resources\ProgramResource;
use Filament\Resources\Pages\EditRecord;

class EditProgram extends EditRecord
{
    protected static string $resource = ProgramResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['title_ru'] = $this->record->title_ru;
        $data['description_ru'] = $this->record->description_ru;
        $data['title_en'] = $this->record->title_en;
        $data['description_en'] = $this->record->description_en;

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->translations()->updateOrCreate(
            ['locale' => 'ru'],
            ['title' => $data['title_ru'], 'description' => $data['description_ru']]
        );

        $this->record->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['title' => $data['title_en'], 'description' => $data['description_en']]
        );

        return [
            'slug' => $data['slug'],
            'is_premium' => $data['is_premium'] ?? false,
            'price' => $data['price'],
            'stock' => $data['stock'],
            'days' => $data['days'],
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'duration_hours' => $data['duration_hours'],
            'image' => $data['image'],
            'program_category_id' => $data['program_category_id'],
        ];
    }
}
