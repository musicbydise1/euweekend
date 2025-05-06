<?php

namespace App\Filament\Admin\Resources\ArticleResource\Pages;

use App\Filament\Admin\Resources\ArticleResource;
use Filament\Resources\Pages\EditRecord;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $ruTrans = $this->record->translations->where('locale', 'ru')->first();
        $enTrans = $this->record->translations->where('locale', 'en')->first();

        $data['title_ru'] = $ruTrans ? $ruTrans->title : '';
        $data['content_ru'] = $ruTrans ? $ruTrans->content : '';
        $data['title_en'] = $enTrans ? $enTrans->title : '';
        $data['content_en'] = $enTrans ? $enTrans->content : '';

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->translations()->updateOrCreate(
            ['locale' => 'ru'],
            ['title' => $data['title_ru'], 'content' => $data['content_ru']]
        );
        $this->record->translations()->updateOrCreate(
            ['locale' => 'en'],
            ['title' => $data['title_en'], 'content' => $data['content_en']]
        );
        return [
            'slug' => $data['slug'],
        ];
    }
}
