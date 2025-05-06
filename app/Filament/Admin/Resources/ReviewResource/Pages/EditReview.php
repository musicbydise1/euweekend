<?php

namespace App\Filament\Admin\Resources\ReviewResource\Pages;

use App\Filament\Admin\Resources\ReviewResource;
use Filament\Resources\Pages\EditRecord;

class EditReview extends EditRecord
{
    protected static string $resource = ReviewResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $ruTrans = $this->record->translations->where('locale', 'ru')->first();
        $enTrans = $this->record->translations->where('locale', 'en')->first();
        $data['content_ru'] = $ruTrans ? $ruTrans->content : '';
        $data['content_en'] = $enTrans ? $enTrans->content : '';
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->translations()->updateOrCreate(
            ['locale' => 'ru'],
            ['content' => $data['content_ru']]
        );
        $this->record->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['content' => $data['content_en']]
        );
        return [];
    }
}
