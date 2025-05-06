<?php

namespace App\Filament\Admin\Resources\ProgramCategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{
    TextInput,
    Textarea,
    FileUpload,
    Toggle,
    DateTimePicker,
    Tabs,
    Tab
};

class ProgramsRelationManager extends RelationManager
{
    protected static string $relationship = 'programs';
    protected static ?string $title = 'Программы';
    protected static ?string $recordTitleAttribute = 'title_ru';

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('slug')->required()->maxLength(255),
            Toggle::make('is_premium')->label('Премиум'),
            TextInput::make('price')->numeric(),
            TextInput::make('stock')->numeric(),
            TextInput::make('days')->numeric(),
            DateTimePicker::make('start_time'),
            DateTimePicker::make('end_time'),
            TextInput::make('duration_hours')->numeric(),
            FileUpload::make('image')->image()->disk('public')->directory('programs'),

            Tabs::make('Переводы')->tabs([
                Tab::make('Русский')->schema([
                    TextInput::make('title_ru')->required(),
                    Textarea::make('description_ru'),
                ]),
                Tab::make('English')->schema([
                    TextInput::make('title_en'),
                    Textarea::make('description_en'),
                ]),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\TextColumn::make('title_ru')->label('Название (RU)'),
            Tables\Columns\ToggleColumn::make('is_premium'),
            Tables\Columns\TextColumn::make('price')->money('KZT'),
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $program = $this->ownerRecord->programs()->create($data);

        $program->translations()->createMany([
            ['locale' => 'ru', 'title' => $data['title_ru'], 'description' => $data['description_ru']],
            ['locale' => 'en', 'title' => $data['title_en'], 'description' => $data['description_en']],
        ]);

        return [];
    }

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
        ];
    }
}
