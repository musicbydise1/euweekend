<?php

namespace App\Filament\Admin\Resources\DayResource\Pages;

use App\Filament\Admin\Resources\DayResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDay extends CreateRecord
{
    protected static string $resource = DayResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $day = \App\Models\Day::create([
            'day_number' => $data['day_number'],
            'image' => $data['image'],
            'program_id' => $data['program_id'],
        ]);

        $day->translations()->createMany([
            [
                'locale' => 'ru',
                'day' => (string)$data['day_number'], // используем day_number как значение для "day"
                'title' => $data['title_ru'],
                'description' => $data['description_ru']
            ],
            [
                'locale' => 'en',
                'day' => (string)$data['day_number'],
                'title' => $data['title_en'],
                'description' => $data['description_en']
            ],
        ]);

        return []; // чтобы не сохранить запись второй раз
    }

}
