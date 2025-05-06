<?php

namespace App\Filament\Admin\Resources\ProgramResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\{
    TextInput,
    FileUpload,
    Tabs,
    Tab,
    Textarea
};

class DaysRelationManager extends RelationManager
{
    protected static string $relationship = 'daysRelations';
    protected static ?string $title = 'Дни';
    protected static ?string $recordTitleAttribute = 'title_ru'; // ✔️ используем accessor из модели

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('day_number')->label('Номер дня')->numeric()->required(),

            FileUpload::make('image')
                ->label('Изображение')
                ->image()
                ->disk('public')
                ->directory('days'),

            Tabs::make('Переводы')->tabs([
                Tab::make('Русский')->schema([
                    TextInput::make('title_ru')->label('Название (RU)')->required(),
                    Textarea::make('description_ru')->label('Описание (RU)'),
                ]),
                Tab::make('English')->schema([
                    TextInput::make('title_en')->label('Title (EN)'),
                    Textarea::make('description_en')->label('Description (EN)'),
                ]),
            ]),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('day_number')->label('День'),
            Tables\Columns\TextColumn::make('title_ru')->label('Название (RU)'),
            Tables\Columns\ImageColumn::make('image')->label('Изображение')->circular(),
        ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $day = $this->ownerRecord->daysRelations()->create([
            'day_number' => $data['day_number'],
            'image' => $data['image'],
        ]);

        $day->translations()->createMany([
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
            'day_number' => $data['day_number'],
            'image' => $data['image'],
        ];
    }
}
