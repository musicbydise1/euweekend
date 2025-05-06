<?php

namespace App\Filament\Admin\Resources\ArticleResource\Pages;

use App\Filament\Admin\Resources\ArticleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;
use App\Models\Article;

class CreateArticle extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (empty($data['slug'])) {
            $slug = Str::slug($data['title_ru'] ?? 'article');
            $originalSlug = $slug;
            $counter = 1;
            while (Article::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter;
                $counter++;
            }
            $data['slug'] = $slug;
        }
        return $data;
    }

    protected function afterCreate($record = null): void
    {
        $record = $record ?? $this->record;
        $record->translations()->createMany([
            [
                'locale'      => 'ru',
                'title'       => $this->data['title_ru'] ?? '',
                'content'     => $this->data['content_ru'] ?? '',
            ],
            [
                'locale'      => 'en',
                'title'       => $this->data['title_en'] ?? '',
                'content'     => $this->data['content_en'] ?? '',
            ],
        ]);
    }
}
