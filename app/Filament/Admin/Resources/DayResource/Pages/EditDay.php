<?php

namespace App\Filament\Admin\Resources\DayResource\Pages;

use App\Filament\Admin\Resources\DayResource;
use Filament\Resources\Pages\EditRecord;

class EditDay extends EditRecord
{
    protected static string $resource = DayResource::class;

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
            'day_number' => $data['day_number'],
            'image' => $data['image'],
            'program_id' => $data['program_id'],
        ];
    }
}
